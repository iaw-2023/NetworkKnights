<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Pet;
use App\Models\Category;
use Exception;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
        $categorias = Category::all();
        return view('Pet.create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imageUrl ="";
        if ($request->hasFile('image')) {
            // Obtener el archivo de imagen del formulario
            $image = $request->file('image');
    
            // Procesar y almacenar la imagen en Cloudinary
            $uploadedImage = $image->storeOnCloudinary();
        
            // Obtener la URL de la imagen en Cloudinary
            $imageUrl = $uploadedImage->getSecurePath();
        
            // Guardar la URL de la imagen en tu modelo o base de datos
            // ...
        }

        $pet = new Pet();

        $pet -> name = $request->get('name');
        $pet -> sex = $request->get('sex');
        $pet -> id_category = $request->get('id_category');
        $pet->image = $imageUrl;
        //$pet->imageId = $uploadedFile->getPublicId();
 
        $pet -> save();
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
        $categorias = Category::all();
        return view('Pet.edit')->with('pet', $pet)->with('categorias',$categorias);
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
