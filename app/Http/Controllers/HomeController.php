<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Hotel;

class HomeController extends Controller
{
    public function index()
    {
        #return the last six locations
        $locations = Location::orderBy('created_at', 'desc')->take(6)->get();

        #return all locations
        $alllocations = Location::all();

        #return the last four published hotels
        $hotels = Hotel::orderBy('created_at', 'desc')
                                ->whereStatut('published')
                                ->take(4)
                                ->get();

        return view('pages.home',[ 'allmyLocations' => $alllocations,'myLocations' => $locations,'myHotels' => $hotels]);
    }

}
