<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// All listings
Route::get('/', [ListingController::class, 'index']);

//Show Create form 
Route::get('listings/create', [ListingController::class, 'create']);

//  Store Listing Data
Route::post('listings', [ListingController::class, 'store']);

// Single Listing
Route::get('listings/{listing}', [ListingController::class, 'show']);

Route::get('/test', [ListingController::class, 'test']);

Route::get('/posts/{id}', function ($id) {
    ddd($id);
    return response('Post: ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function (Request $request) {
    dd($request->name . ' ' . $request->city);
});
