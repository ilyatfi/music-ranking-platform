<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;

class ArtistAlbumController extends Controller
{
    public function index()
    {
        if (!auth()->user()->isArtist()) {
            abort(403, 'You must be an artist to manage albums.');
        }

        $albums = Album::where('artist_id', Auth::user()->artist?->id)->get();

        return view('artist.albums.index', compact('albums'));
    }

    public function edit(Album $album)
    {
        $this->authorizeOwnership($album);
        return view('artist.albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $this->authorizeOwnership($album);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'genre' => 'required|string|max:255',
        ]);

        $album->update($validated);

        return redirect()->route('artist.albums.index')->with('success', 'Album updated successfully.');
    }

    public function destroy(Album $album)
    {
        $this->authorizeOwnership($album);
        $album->delete();

        return redirect()->route('artist.albums.index')->with('success', 'Album deleted successfully.');
    }

    protected function authorizeOwnership(Album $album)
    {
        if (Auth::user()->artist?->id !== $album->artist_id) {
            abort(403, 'Unauthorized action.');
        }
    }
}
