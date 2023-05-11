<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $pets = Pet::all();
        return view('Pet.index')->with('pets', $pets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pets = new Pet();

        $pets -> name = $request->get('name');
        $pets -> sex = $request->get('sex');
        $pets -> id_category = $request->get('id_category');

        $pets -> save();

        return redirect('/pets');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pet = Pet::find($id);
        return view('Pet.edit')->with('pet', $pet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pet = Pet::find($id);

        $pet -> name = $request->get('name');
        $pet -> sex = $request->get('sex');
        $pet -> id_category = $request->get('id_category');

        $pet -> save();

        return redirect('/pets');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pet = Pet::find($id);
        $pet->delete();

        return redirect('/pets');
    }
}
