<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->isArtist()) {
            abort(403, 'Only artists can add albums.');
        }

        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->isArtist()) {
            abort(403, 'Only artists can add albums.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'genre' => 'required|string|max:255',
        ]);

        $artist = auth()->user()->artist;

        if (!$artist) {
            return redirect()->back()->with('error', 'You must have an artist profile to add albums.');
        }
        if ($artist->albums()->where('title', $request->title)->exists()) {
            return redirect()->back()->with('error', 'An album with this title already exists for this artist.');
        }

        $album = new Album();
        $album->title = $request->title;
        $album->genre = $request->genre;
        $album->release_date = $request->release_date;
        $album->artist_id = $artist->id;
        $album->save();

        return redirect()->route('artists.show', $artist)->with('success', 'Album added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        $album->load('artist', 'reviews.user', 'ratings');
        $averageRating = $album->ratings->avg('score');

        return view('albums.show', compact('album', 'averageRating'));
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
