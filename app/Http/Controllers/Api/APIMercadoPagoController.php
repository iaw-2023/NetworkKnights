<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;


class APIMercadoPagoController extends Controller {

    public function pago(Request $request){
        $data = $request->json()->all();
        $amount = floatval($data['amount']);
        
        MercadoPagoConfig::setAccessToken("TEST-3661556790228369-121317-897c788bdd3e8447ab193aa552293041-300268531");
        $client = new PreferenceClient();
        $preference = $client->create([
            "items"=> array(
            array(
                "title" => $data['title'],
                "quantity" => $data['quantity'],
                "unit_price" => $amount
            )
            ),
        ]);

        return response()->json(['preference_id' => $preference->id]);
    }
}