<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;


class ListingController extends Controller
{
    // All Listings
    public function index()
    {
        //dd(request('tag'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
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
}
