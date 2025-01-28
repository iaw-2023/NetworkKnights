<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Client;
use App\Models\Pet;

class APIOrderController extends Controller
{

    /**
 * @OA\Post(
 *     path="/rest/orders",
 *     summary="Almacenar una nueva orden",
 *     description="Almacena una nueva orden en la base de datos.",
 *     tags={"Orders"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="email",
 *                 type="string",
 *                 description="Correo electrónico del cliente."
 *             ),
 *             @OA\Property(
 *                 property="id_pet",
 *                 type="integer",
 *                 description="ID de la mascota que se desea adoptar."
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Orden creada con éxito.",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 description="Mensaje de éxito."
 *             ),
 *             @OA\Property(
 *                 property="order_id",
 *                 type="integer",
 *                 description="ID de la orden creada."
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="La mascota no existe o ya ha sido adoptada."
 *     )
 * )
 */

    public function store(Request $request)
    {
        // Obtengo el correo electrónico del request
        $email = $request->input('email');

        // Verifico existe un cliente con ese mail en la base de datos
        $client = Client::where('email', $email)->first();
        
            // Si el usuario no existe, lo creo
            if (!$client) {
                //$name = strstr($email, '@', true);
                $name = $request->input('name');
                $surname = $request->input('surname');
                $client = Client::create([
                    'name' => $name,
                    'surname' =>$surname,
                    'email' => $email,
                    
                ]);
                echo $client;
                $client->save;       
                echo "despues de guardar";
            }

        // Obtener el ID de la mascota que desea adoptar
        $petId = $request->input('id_pet');

            // Verificar si la mascota existe y su campo 'id_order' es nulo
            $pet = Pet::where('id', $petId)
                ->whereNull('id_order')
                ->first();
            
            if (!$pet) {
                return response()->json(['La mascota no existe o ya ha sido adoptada'], 404);
            }

        // Crear la nueva orden
                 
        $order = Order::create([
            'id_client' => $client->id
        ]);
        $order->save();

        // Asignar el ID de la orden al campo 'id_order' de la mascota que estaba en null
        $pet->id_order = $order->id;
        $pet->save();

        return response()->json(['message' => 'La orden ha sido creada con éxito', 'order_id' => $order->id]);
        }
    }

    

