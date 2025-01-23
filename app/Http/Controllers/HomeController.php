<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function landingPage()
    {
        $rooms = Room::all();

        return view('frontend.landing_page', compact('rooms'));
    }
}
