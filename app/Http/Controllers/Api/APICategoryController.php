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
     *                     property="name",
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
 * @OA\Get(
 *     path="/rest/categories/{id}",
 *     summary="Obtener una categoría específica",
 *     description="Devuelve los detalles de una categoría en particular.",
 *     operationId="getCategoryById",
 *     tags={"Categories"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID de la categoría a obtener",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Categoría obtenida correctamente",
 *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     description="ID de la categoría."
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     description="Nombre de la categoría."
     *                 )
     *             )
     *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Categoría no encontrada",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Categoría no encontrada")
 *         )
 *     ),
 *     security={{ "apiAuth": {} }}
 * )
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
