<?php

namespace App\Http\Controllers;

use App\Models\Nailpolish;
use Illuminate\Http\Request;

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
        //
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
    public function show(Nailpolish $nailpolish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nailpolish $nailpolish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nailpolish $nailpolish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nailpolish $nailpolish)
    {
        //
    }
}
