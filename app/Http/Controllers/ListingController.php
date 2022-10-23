<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listing
    public function index(Request $request) {
        dd($request);
        return view('listings', [
            'listings' => Listing::all()]);
    }

    // Show single listing
    public function show(Listing $listing) {
        return view('listing', [
            'listing' => $listing
        ]);
    }
}
