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
        // here's the category

        $nailpolishes = Nailpolish::All();

        return view('categories.create')->with('nailpolishes', $nailpolishes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
        return view('categories.edit')->with('nailpolishes', $nailpolishes);       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
