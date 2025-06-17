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

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        $albums = $artist->albums()->withCount(['reviews', 'ratings'])->get();
        return view('artists.show', compact('artist', 'albums'));
    }
}
