<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pet;

class APIPetController extends Controller
{
    /**
     * @OA\Get(
     *     path="/pets",
     *     summary="Obtener todas las mascotas",
     *     description="Obtiene todas las mascotas almacenadas en la base de datos.",
     *     tags={"Mascotas"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Pet")
     *         )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Mensaje de error"
     *             )
     *         )
     *     )
     * )
     */

    public function index()
    {
        $pets = Pet::all();
        return response()->json($pets);
    }

    /**
     * @OA\Get(
     *     path="/pets/{id}",
     *     summary="Obtener una mascota por su ID",
     *     description="Obtiene una mascota específica almacenada en la base de datos según su ID.",
     *     tags={"Mascotas"},
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
     *         @OA\JsonContent(ref="#/components/schemas/Pet")
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
        $pet = Pet::find($id);
        if (!$pet) {
            return response()->json(['error' => 'Mascota no encontrada'], 404);
        }
        return response()->json($pet);
    }
}
