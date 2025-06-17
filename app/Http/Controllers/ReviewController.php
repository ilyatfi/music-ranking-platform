<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Album $album)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'album_id' => $album->id,
            'content' => $request->content,
        ]);

        return redirect()->route('albums.show', $album);
    }
}
