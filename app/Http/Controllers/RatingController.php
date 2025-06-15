<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Rating;

class RatingController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'album_id' => 'required|exists:albums,id',
            'score' => 'required|integer|min:1|max:10',
        ]);

        $existing = Rating::where('album_id', $request->album_id)->where('user_id', auth()->id())->first();

        if ($existing) {
            return redirect()->back()->with('error', 'You have already rated this album.');
        }

        Rating::create([
            'album_id' => $request->album_id,
            'user_id' => auth()->id(),
            'score' => $request->score,
        ]);

        return redirect()->back()->with('success', 'Rating submitted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, Album $album, Rating $rating)
    {
        if ($rating->user_id !== auth()->id() || $rating->album_id !== $album->id) {
            abort(403);
        }

        $request->validate([
            'score' => 'required|integer|min:1|max:10',
        ]);

        $rating->update([
            'score' => $request->score,
        ]);

        return redirect()->back()->with('success', 'Rating updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
