<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Nailpolish;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all(); // retrieve all categories from database
        return view('categories.index', compact('categories')); //pass retrieved categories to the categories.index view
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('categories.index')->with('error', 'Access denied.');
        }

        // here are the nailpolishes
    

        $nailpolishes = Nailpolish::All();

        return view('categories.create')->with('nailpolishes', $nailpolishes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
        ]);

        $category->nailpolishes()->sync($request->nailpolishes);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        $nailpolishes = Nailpolish::all();
        
        $categoryNailpolishes = $category->nailpolishes->pluck('id')->toArray();
        // return redirect(route('categories.edit'));
        return view('categories.edit', compact('category', 'nailpolishes', 'categoryNailpolishes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:1000',

            
        ]);
        $category->update($validated);

        $nailpolishes = $request->nailpolishes ?? [];

        $category->nailpolishes()->detach();
        
        if (!empty($nailpolishes)) {
            $category->nailpolishes()->attach($nailpolishes);
        }

        return redirect()->route('categories.index')->with('success', 'Review updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        
        // Delete the review
        $category->delete();        

        // Redirect to the nailpolish page with a success message
        return redirect(route('categories.index'));
    
    }
}
