<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Category::all();
        return view('category.index')-> with('categorias',$categorias);
    }

    public function indexApi()
    {
        $categorias = Category::all();
        return response()->json($categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorias = new Category();

        $categorias->id = $request->get('id');
        $categorias->name = $request->get('name');

        $categorias->save();

        return redirect('/categories');
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
        $categoria = Category::find($id);
        return view('category.edit')->with('categoria',$categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Category::find($id);

        $categoria->id = $request->get('id');
        $categoria->name = $request->get('name');

        $categoria->save();

        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Category::find($id);
        $categoria->delete();

        return redirect('/categories');
    }
}
