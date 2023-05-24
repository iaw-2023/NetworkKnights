<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pet;

class APIPetController extends Controller
{
    /**
     * * Obtiene una lista de todas las mascotas existentes.
     *
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get(
     *     path="/rest/pets",
     *     summary="Obtener todas las mascotas",
     *     description="Obtiene todas las mascotas almacenadas en la base de datos.",
     *     tags={"Pets"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     description="ID de la mascota."
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     description="Nombre de la mascota."
     *                 )
     *          )
     *     )
     * )
     * )
     */

    public function index()
    {
        $pets = Pet::with('category')->get()->map(function ($pet) {
            $petData = $pet->only(['id', 'name', 'sex', 'image']);
            $petData['category_name'] = $pet->category->name ?? null;
            return $petData;
        });
    
        return response()->json($pets);
    }

    /**
     * @OA\Get(
     *     path="/pets/{id}",
     *     summary="Obtener una mascota por su ID",
     *     description="Obtiene una mascota específica almacenada en la base de datos según su ID.",
     *     tags={"Pets"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la mascota a obtener",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="uuid"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *          type="array",
     *              @OA\Items(
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     description="ID de la mascota."
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     description="Nombre de la mascota."
     *                 )
     *          ))
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="No encontrado",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 description="Mensaje de error"
     *             )
     *         )
     *     )
     * )
     */

     public function show(string $id)
{
    $pet = Pet::with('category')->find($id);
    if (!$pet) {
        return response()->json(['error' => 'Mascota no encontrada'], 404);
    }
    
    $petData = $pet->only(['id', 'name', 'sex', 'image']);
    $petData['category_name'] = $pet->category->name ?? null;
    
    return response()->json($petData);
}
}
