<?php

namespace App\Http\Controllers;

use App\Models\Nailpolish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NailpolishController extends Controller
{
    /**
     * Display a listing of all nailpolishes.
     */
    public function index()
    {
        
        $nailpolishes = Nailpolish::all(); // retrieve all nailpolishes from database
        return view('nailpolishes.index', compact('nailpolishes')); //pass retrieved nailpolishes to the nailpolishes.index view
    }

    /**
     * Show the form for creating a new nailpolish.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('nailpolishes.index')->with('error', 'Access denied.');
        }
        return view('nailpolishes.create');//render the nailpolishes.create view to display the form
    }

    /**
     * Store a newly created nailpolish in storage.
     */
    public function store(Request $request)
    {
        //validate the data
        $request->validate([
            'name' =>'required',
            'description' =>'required|max:500',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        //check if image file was uploaded
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/nailpolishes'), $imageName);
        }
        //create new nailpolish record in database
        Nailpolish::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'updated_at' => now(),
            'created_at' => now()
        ]);
        
        //redirect to the index page with a success message
        return to_route('nailpolishes.index')->with('success','Nailpolish created successfully!');
    }

    /**
     * Display the specified nailpolish.
     */
    public function show(Nailpolish $nailpolish)
    {
        $nailpolish->load('reviews.user');
        return view('nailpolishes.show', compact('nailpolish'));
        //return view('nailpolishes.show')->with('nailpolish', $nailpolish);
    }

    /**
     * Show the form for editing the specified nailpolish.
     */
    public function edit(Nailpolish $nailpolish)
    {
        //
        // Gate::authorize('update', $nailpolish);
        
        //pass retrieved nailpolish to the nailpolishes.edit view
        return view('nailpolishes.edit')->with('nailpolish', $nailpolish);       
    }

    /**
     * Update the specified nailpolish in storage.
     */
    public function update(Request $request, Nailpolish $nailpolish): RedirectResponse
    {
        //
        // Gate::authorize('update', $nailpolish);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
        
        //update nailpolish record in database
        $nailpolish->update($validated);
 
        //return redirect(route('nailpolishes.index'));
        return to_route('nailpolishes.index')->with('success','Nailpolish updated successfully!');
    }

    /**
     * Remove the specified nailpolish from storage.
     */
    public function destroy(Nailpolish $nailpolish)
    {
        //delete nailpolish record in database
       $nailpolish->delete();

        //return to index
       return redirect(route('nailpolishes.index'));
    }
}
