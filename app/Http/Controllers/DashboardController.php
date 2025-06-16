<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;


class DashboardController extends Controller
{
    public function index()
{
    $rooms = Room::all();
    return view('dashboard.index', compact('rooms'));
}
}
