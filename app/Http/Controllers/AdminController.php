<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::user() || !Auth::user()->isAdmin())
        {
            abort(403, 'Access denied');
        }

        $reviews = Review::with('user', 'album')->latest()->get();
        return view('admin.index', compact('reviews'));
    }

    public function destroyReview(Review $review)
    {
        if (!Auth::user() || !Auth::user()->isAdmin())
        {
            abort(403, 'Access denied');
        }
        
        $review->delete();
        return back()->with('success', __('Review deleted successfully.'));
    }
}
