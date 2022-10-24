<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    // Show all listing
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag',
            'search']))->paginate(6)
        ]);
    }

    // Show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show Create Form
    public function create() {
        return view('listings.create');
    }

    // Store Listing Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings','company')] ,
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id(); // 사용자 저장

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

       // Update Listing Data
       public function update(Request $request, Listing $listing) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'] ,
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destory(Listing $listing) {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }
}
