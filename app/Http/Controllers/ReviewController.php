<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Nailpolish;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Nailpolish $nailpolish)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $nailpolish->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'nailpolish_id' => $nailpolish->id
        ]);

        return redirect()->route('nailpolishes.show', $nailpolish)->with('success','Review added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        if (auth()->user()->id !== $review->user_id && auth()->user()-role !== 'admin'){
            return redirect()->route('nailpolishes.show, $nailpolish')->with('error', 'Access denied.');
        }
        
        return view('reviews.edit')->with('review', $review);
    }

    /**
     * Update the specified resource in storage.
     */

     
    public function update(Request $request, Review $review)
    {
        //$validated
    
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

    //    $review->update($request->only(['rating', 'comment']));
       $review->update($validated);

       return redirect()->route('nailpolishes.show', $review->nailpolish_id)->with('success', 'Review updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
          // Check if the user is the owner of the review or an admin
          if (auth()->user()->id !== $review->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('nailpolishes.index')->with('error', 'Access denied.');
        }

        // Delete the review
        $review->delete();

        // Redirect to the nailpolish page with a success message
        return redirect()->route('nailpolishes.show', $review->nailpolish_id)        
                         ->with('success', 'Review deleted successfully.');
    }
}
