<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{


    // show all user
    public function index(){
        return view('listings.index',[
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    // show single user
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }

    // Create listing

    public function create(){
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $formValidation = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listing','company')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'website' => 'required|url',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formValidation['logo'] = $request->file('logo')->store('logos','public');
        }

        $formValidation['user_id'] = auth()->id();
        Listing::create($formValidation);
        

        return redirect('/')->with('message','Listing created successfully!');
    }


    public function edit(Listing $listing){
        // dd($listing->title);
        return view('listings.edit', ['listing' => $listing]); 
    }
    

    public function update(Request $request, Listing $listing)
    {

        if($listing['user_id'] != auth()->id())
        {
            return abort('403','Unauthorized Action!');
        }

        $formValidation = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'website' => 'required|url',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formValidation['logo'] = $request->file('logo')->store('logos','public');
        }

        $listing->update($formValidation);
        return back()->with('message','Listing updated successfully!');
    }

    public function destroy(Listing $listing)
    {
        if($listing['user_id'] != auth()->id())
        {
            return abort('403','Unauthorized Action!');
        }
        
        $listing->delete();
        return redirect('/')->with('message','Listing Deleted Successfully!');
    }

    // Manage Listings
    public function manage()
    {
        // dd(auth()->user()->list()->get());
        return view('listings.manage',['listings' => auth()->user()->list()->get()]);
    }

}
