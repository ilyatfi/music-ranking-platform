<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ArtistAdminController extends Controller
{
    public function create()
    {
        if (!Auth::user() || !Auth::user()->isAdmin())
        {
            abort(403, 'Access denied');
        }
        $users = User::where('role', '!=', 'artist')
             ->whereDoesntHave('artist')
             ->get();

        return view('admin.artists.create', compact('users'));
    }

    public function index()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Access denied');
        }

        $artists = Artist::with('user')->get();
        return view('admin.artists.index', compact('artists'));
    }

    public function destroy(Artist $artist)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Access denied');
        }

        $user = $artist->user;

        $artist->delete();

        if (!$user->artist) {
            $user->role = 'user';
            $user->save();
        }

        return redirect()->route('admin.artists.index')->with('success', __('Artist deleted successfully.'));
    }

    public function store(Request $request)
    {
        if (!Auth::user() || !Auth::user()->isAdmin())
        {
            abort(403, 'Access denied');
        }
        if (Artist::where('user_id', $request->user_id)->exists())
        {
            return redirect()->back()->with('error', 'This user already has an artist profile.');
        }
        if (!User::where('id', $request->user_id)->exists())
        {
            return redirect()->back()->with('error', 'User does not exist.');
        }
        if (User::find($request->user_id)->role === 'admin')
        {
            return redirect()->back()->with('error', 'This user is an admin and cannot be assigned as an artist.');
        }
        
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'stage_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validated['profile_picture'] = $path;
        }

        Artist::create($validated);

        // update user role to 'artist'
        $user = User::find($validated['user_id']);
        if ($user->role !== 'artist') {
            $user->role = 'artist';
            $user->save();
        }

        return redirect()->route('admin.artists.create')->with('success', 'Artist created successfully!');
    }
}
