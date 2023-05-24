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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Obtengo el correo electrónico del request
        $email = $request->input('email');

        // Verifico existe un cliente con ese mail en la base de datos
        $client = Client::where('email', $email)->first();

        // Si el usuario no existe, lo creo
        if (!$client) {
            $name = strstr($email, '@', true);
            $client = Client::create([
                'name' => $name,
                'email' => $email,
            ]);
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
            // Otros campos de la orden si es necesario
        ]);

        // Asignar el ID de la orden al campo 'id_order' de la mascota
        $pet->id_order = $order->id;
        $pet->save();

        return response()->json(['message' => 'La orden ha sido creada con éxito', 'order_id' => $order->id]);
        }
    }

    

