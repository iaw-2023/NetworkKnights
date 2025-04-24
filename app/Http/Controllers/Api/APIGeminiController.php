<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class APIGeminiController extends Controller
{
    public function getPetTips(Request $request)
    {
        $data = $request->only(['name', 'category', 'sex', 'size']);
        $apiKey = "AIzaSyBseN7uyqKn6e2v6KBoEjhrPxX6ZSqLutc";
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey";

        $prompt = "🎉 ¡Aquí van algunos consejos de cuidado para tu mascota! 🐾\n\n".
          " **Nombre**: {$data['name']}\n".
          "🦴 **Tipo**: {$data['category']}\n".
          "♂️♀️ **Género**: {$data['sex']}\n".
          "📏 **Tamaño**: {$data['size']}\n".
          "🖼️ **Imagen**: " . (!empty($data['image']) ? "Sí" : "No") . "\n\n".
          "📋 **Consejos**:\n".
          "1. Mantén a tu mascota hidratada 💧.\n".
          "2. Asegúrate de darle ejercicio regularmente 🏃‍♂️.\n".
          "3. Dale un lugar cómodo para descansar 🛏️.\n".
          "4. Visita al veterinario para chequeos 🏥.\n".
          "5. No olvides su comida y premios favoritos 🍖🍪.";

        try {
            $response = Http::post($url, [
                'contents' => [['parts' => [['text' => $prompt]]]],
            ]);

            if ($response->successful()) {
                $body = $response->json();
                return response()->json([
                    'tips' => $body['candidates'][0]['content']['parts'][0]['text'] ?? "No se obtuvieron consejos"
                ]);
            }

            return response()->json(['error' => 'Error en la API de Gemini', 'details' => $response->body()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener consejos', 'details' => $e->getMessage()], 500);
        }
    }
}
