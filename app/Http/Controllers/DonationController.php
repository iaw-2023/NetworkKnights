<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donaciones = Donation::all();
        return view('Donation.index')-> with('donaciones',$donaciones);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Donation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
     * Store a newly created resource in storage.
     * $donaciones = new Donation();
    *$donaciones->name = $request->get('mount');

       * $donaciones->save();

        *return redirect('/donations');
     */
        
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
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donacion = Donation::find($id);
        $donacion->delete();

        return redirect('/donations');
    }
}
