<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenes = Order::all();
        return view ('Order.index')->with('ordenes',$ordenes);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ordenes = new Order();

        $ordenes->id = $request->get('id');
        $ordenes -> id_user = $request->get('id_user');

        $ordenes->save();

        return redirect('/orders');
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
        $orden = Order::find($id);
        return view('Order.edit')->with('orden',$orden);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orden = Order::find($id);

        $orden->id = $request->get('id');
        

        $orden->save();

        return redirect('/orders');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('/orders');
    }
}
