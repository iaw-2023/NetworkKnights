<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
     public function __construct()
     {
         // Usar el formato correcto para aplicar múltiples middleware en un solo array
         $this->middleware([
             'role:admin',
             'permission:create category',
         ])->only(['create', 'store']); 
     
         $this->middleware([
             'role:admin',
             'permission:edit category',
         ])->only(['edit', 'update']);
     
         $this->middleware([
             'role:admin',
             'permission:delete category',
         ])->only(['destroy']);
     }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Category::all();
        return view('Category.index')-> with('categorias',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorias = new Category();
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
        return view('Category.edit')->with('categoria',$categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Category::find($id);

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