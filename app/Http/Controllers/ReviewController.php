<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'room_id' => 'required|exists:rooms,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string'
    ]);

    Review::create([
        'user_id' => auth()->id(),
        'room_id' => $request->room_id,
        'rating' => $request->rating,
        'comment' => $request->comment
    ]);

    return back()->with('success', 'Ulasan berhasil dikirim!');
}

}
