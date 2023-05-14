<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class APICategoryController extends Controller
{
      /**
     * Obtiene una lista de todas las categorías existentes.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *     path="/rest/categories",
     *     tags={"Categories"},
     *     summary="Obtiene una lista de todas las categorías existentes.",
     *     description="Retorna un JSON con la lista de todas las categorías existentes en la base de datos.",
     *     @OA\Response(
     *         response="200",
     *         description="Lista de categorías obtenida correctamente.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     description="ID de la categoría."
     *                 ),
     *                 @OA\Property(
     *                     property="nombre",
     *                     type="string",
     *                     description="Nombre de la categoría."
     *                 )
     *             )
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
