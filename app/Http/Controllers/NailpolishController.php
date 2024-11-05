<?php

namespace App\Http\Controllers;

use App\Models\Nailpolish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NailpolishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nailpolishes = Nailpolish::all(); // fetch all nailpolishes
        return view('nailpolishes.index', compact('nailpolishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nailpolishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'description' =>'required|max:500',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->time->move(public_path('images/nailpolishes'), $imageName);
        }

        Nailpolish::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'updated_at' => now(),
            'created_at' => now()
        ]);

       /* Nailpolish::edit([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'updated_at' => now(),
            'created_at' => now()
        ]);
        
        */

        return to_route('nailpolishes.index')->with('success','Nailpolish created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nailpolish $nailpolish)
    {
        return view('nailpolishes.show')->with('nailpolish', $nailpolish);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nailpolish $nailpolish): View
    {
        //
        Gate::authorize('update', $nailpolish);
 
        return view('nailpolishes.edit', [
            'nailpolish' => $nailpolish,
        ]);

       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nailpolish $nailpolish): RedirectResponse
    {
        //
        Gate::authorize('update', $nailpolish);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $nailpolish->update($validated);
 
        //return redirect(route('nailpolishes.index'));
        return to_route('nailpolishes.index')->with('success','Nailpolish updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nailpolish $nailpolish)
    {
       //
       Gate::authorize('delete', $nailpolish);
 
       $nailpolish->delete();

       return redirect(route('nailpolishes.index'));
    }
}
