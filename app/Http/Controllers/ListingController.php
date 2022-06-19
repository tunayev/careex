<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    // All Listings
    public function index()
    {
        //dd(request('tag'));
        //dd(Listing::latest()->filter(request(['tag', 'search']))->paginate(8));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(8)
        ]);
    }

    // Single Listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    // Store the data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title'     => 'required',
            'company'   => ['required', Rule::unique('listings', 'company')],
            'location'  => 'required',
            'website'   => 'required',
            'email'     => ['required', 'email'],
            'tags'      => 'required',
            'description' => 'required'
        ]);

        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully');
        //dd($request->all());
    }
}
