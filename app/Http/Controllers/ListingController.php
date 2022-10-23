<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listing
    public function index() {
        return view('listings', [
            'listings' => Listing::latest()->filter(request(['tag','search']))->get()]);
    }

    // Show single listing
    public function show(Listing $listing) {
        return view('listing', [
            'listing' => $listing
        ]);
    }

    // Show Create Form
    public function create() {
        return view('listings.create');
    }

}
