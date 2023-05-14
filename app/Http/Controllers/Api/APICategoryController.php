<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class APICategoryController extends Controller
{
     /**
     * @OA\Get(
     *     path="/rest/categorias",
     *     summary="Retorna las categorías",
     *     tags={"Categorias"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Categoria")           
     *         )
     *     )
     * )
     */
    public function index()
    {
        $categorias = Category::all();
        return response()->json($categorias);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Category::find($id);
        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }
        return response()->json($categoria);
    }

}
