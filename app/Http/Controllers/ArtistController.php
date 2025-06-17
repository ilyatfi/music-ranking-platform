<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $artists = Artist::when($search, function ($query, $search) {
            return $query->where('stage_name', 'like', "%{$search}%");
        })->orderBy('updated_at', 'desc')->get();

        return view('artists.index', compact('artists', 'search'));
    }

    public function create()
    {
        if (!Auth::user() || !Auth::user()->isAdmin())
        {
            abort(403, 'Access denied');
        }
        $users = User::where('role', '!=', 'artist')
             ->whereDoesntHave('artist')
             ->get();

        return view('artists.create', compact('users'));
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

        return redirect()->route('artists.create')->with('success', 'Artist created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        $albums = $artist->albums()->withCount(['reviews', 'ratings'])->get();
        return view('artists.show', compact('artist', 'albums'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
