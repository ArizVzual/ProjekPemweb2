<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
{
    $reviews = [
        ['user' => 'Bryan', 'rating' => 4, 'comment' => 'Bagus dan bersih.'],
        ['user' => 'Alex', 'rating' => 5, 'comment' => 'Sangat nyaman untuk rapat.'],
        ['user' => 'Sandra', 'rating' => 3, 'comment' => 'Perlu AC tambahan.'],
    ];

    return view('reviews.index', compact('reviews'));
}


}
