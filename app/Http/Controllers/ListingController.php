<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listings
    public function index() {
        return view('listings', [
            'listings' => Listing::all()
        ]);
    }

    // Show single listing
    public function show() {

    }
}
