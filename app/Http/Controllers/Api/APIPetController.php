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
     *     description="Obtiene todas las mascotas que estan disponibles para adoptar.",
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
    *                 ),
    *                 @OA\Property(
    *                     property="image",
    *                     type="string",
    *                     description="URL de la imagen de la mascota."
    *                 ),
                       @OA\Property(
    *                     property="size",
    *                     type="string",
    *                     description="Tamaño de la mascota."
    *                 ),
    *                 @OA\Property(
    *                     property="sex",
    *                     type="string",
    *                     description="Sexo de la mascota."
    *                 ),
    *                 @OA\Property(
    *                     property="size",
    *                     type="string",
    *                     description="Tamaño de la mascota."
    *                 ),
    *                 @OA\Property(
    *                     property="category_name",
    *                     type="string",
    *                     description="Nombre de la categoría de la mascota."
    *                 )
    *             )
    *         )
    *     ),
    *       @OA\Response(
    *         response=204,
    *         description="No Content",
    *         @OA\JsonContent(
    *             @OA\Property(
    *                 property="message",
    *                 type="string",
    *                 example="No hay mascotas disponibles para adoptar."
    *             )
    *         )
    *     )
    * )
     * 
     */

    public function index(){
        $pets = Pet::with('category')
            ->whereNull('id_order')
            ->get()
            ->map(function ($pet) {
                $petData = $pet->only(['id', 'size', 'name', 'sex', 'image']);
                $petData = $pet->only(['id', 'size', 'name', 'sex', 'image']);
                $petData['category_name'] = $pet->category->name ?? null;
                return $petData;
            });

        if ($pets->isEmpty()) {
            return response()->json(['message' => 'No hay mascotas disponibles para adoptar'], 200);
        }

        return response()->json($pets, 200);
    }  
     
     
     

    /**
     * @OA\Get(
     *     path="rest/pets/{id}",
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
    *                 ),
    *                 @OA\Property(
    *                     property="image",
    *                     type="string",
    *                     description="URL de la imagen de la mascota."
    *                 ),
    *                 @OA\Property(
    *                     property="sex",
    *                     type="string",
    *                     description="Sexo de la mascota."
    *                 ),
    *               @OA\Property(
    *                     property="size",
    *                     type="string",
    *                     description="Tamaño de la mascota."
    *                 ),
    *                 @OA\Property(
    *                     property="category_name",
    *                     type="string",
    *                     description="Nombre de la categoría de la mascota."
    *                 )
    *             )
    *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="No encontrado",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 example="Mascota no encontrada"
     *             )
     *         )
     *     )
     * )
     * 
     */

     public function show(string $id)
{
    $pet = Pet::with('category')->find($id);
    if (!$pet) {
        return response()->json(['Mascota no encontrada'], 404);
    }
    
     $petData = $pet->only(['id', 'name','size', 'sex', 'image']);
    $petData['category_name'] = $pet->category->name ?? null;
    
    return response()->json($petData);
}

/**
 * Obtiene una lista de mascotas en adopcion, por categoría.
 *
 * @OA\Get(
 *     path="/rest/pets/category/{categoryName}",
 *     summary="Obtener mascotas por categoría",
 *     description="Obtiene todas las mascotas de una categoría específica.",
 *     tags={"Pets"},
 *     @OA\Parameter(
 *         name="categoryName",
 *         in="path",
 *         description="Nombre de la categoría",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
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
 *                 ),
 *                 @OA\Property(
 *                     property="image",
 *                     type="string",
 *                     description="URL de la imagen de la mascota."
 *                 ),
 *                 @OA\Property(
 *                     property="sex",
 *                     type="string",
 *                     description="Sexo de la mascota."
 *                 ),
 *                 @OA\Property(
 *                     property="category_name",
 *                     type="string",
 *                     description="Nombre de la categoría de la mascota."
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="No encontrado",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Categoría no encontrada"
 *             )
 *         )
 *     )
 * )
 */

public function getPetsByCategory(string $categoryName)
{
    $pets = Pet::with('category')
        ->whereHas('category', function ($query) use ($categoryName) {
            $query->where('name', 'LIKE', '%' . $categoryName . '%');
        })
        ->whereNull('id_order')
        ->get()
        ->map(function ($pet) {
            $petData = $pet->only(['id', 'name', 'sex', 'image']);
            $petData['category_name'] = $pet->category->name ?? null;
            return $petData;
        });

    if ($pets->isEmpty()) {
        return response()->json(['No hay mascotas disponibles para adoptar de la categoría ' . $categoryName], 404);
    }

    return response()->json($pets);
}




}
