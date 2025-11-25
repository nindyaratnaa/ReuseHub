<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
            'item_id' => 'nullable|exists:items,id'
        ]);

        $validated['reviewer_id'] = auth()->id();

        Review::create($validated);

        if ($request->item_id) {
            \App\Models\Item::where('id', $request->item_id)->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Rating berhasil dikirim!'
        ]);
    }

    public function show($userId)
    {
        $user = \App\Models\User::findOrFail($userId);
        $reviews = Review::where('user_id', $userId)
            ->with('reviewer')
            ->latest()
            ->get();

        return view('review', compact('user', 'reviews'));
    }
}
