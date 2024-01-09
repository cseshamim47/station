<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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


// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

// All listing
Route::get('/', [ListingController::class, 'index']);

//create listing 
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// store listing data
Route::post('/listings',[ListingController::class, 'store'])->middleware('auth');

// show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');


// Manage Listing
Route::get('/listings/manage',[ListingController::class, 'manage']);

// single listing : best way to fix
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/create form
Route::get('/register', [UserController::class,'create'])->middleware('guest');

// create new user
Route::post('/users', [UserController::class, 'store']);

// logout user
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');

// show login from
Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');

// Login to system
Route::post('/users/authenticate', [UserController::class,'authenticate']);



// single listing (has prb : undefined id)
// Route::get('/listings/{id}', function ($id) {
//     return view('listing',[
//         'listing' => Listing::find($id)
//     ]);
// });

// single listing : normal way to fix
// Route::get('/listings/{id}', function ($id) {
//     $listing = Listing::find($id);
//     if($listing)
//     {
//         return view('listing',[
//             'listing' => $listing
//         ]);
//     }else abort('404');
// });





// Route::get('/hello', function(){
//     return response('<h1>Hello World</h1>', 200)
//     ->header('Content-Type', 'html')
//     // ->header('Content-Type','text/plain');
//     ->header('foo','bar');
// });

// Route::get('/post/{id}', function($id){
//     return response('Post '.$id);
// })->where('id','[0-9]+');

// Route::get('/search', function(Request $request){

//     return response($request->name . " " . $request->email);
// });


