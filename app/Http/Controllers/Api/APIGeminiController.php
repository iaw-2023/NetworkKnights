<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class APIGeminiController extends Controller
{
    public function getPetTips(Request $request)
    {
        $data = $request->only(['name', 'category', 'sex', 'size']);
        $apiKey = "AIzaSyBseN7uyqKn6e2v6KBoEjhrPxX6ZSqLutc";
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey";

        //$detalleTamaño = fraseTamaño($data['size']);
        
        $prompt = <<<EOT
        Dame 5 consejos específicos para el cuidado de una mascota con las siguientes características:
        
        - Nombre: {$data['name']}
        - Tipo: {$data['category']}
        - Sexo: {$data['sex']}
        - Tamaño: {$data['size']}
        - Si no está castrado, debes poder asegurar su castración 
        
        consejos en relacion por ejemplo con: hidratacion, ejercicio, lugar para descansar, chequeos veterinarios, comida y premios.
        
        Respondé solo con los 5 consejos cortos usando formato Markdown y cada uno separado del otro por un salto. SIN INTRODUCCIONES NI CONCLUSIONES.
        EOT;


        try {
            //$htmlTips = nl2br(e(Str::markdown($prompt)));
            $response = Http::post($url, [
                'contents' => [['parts' => [['text' => $prompt]]]],
            ]);

            if ($response->successful()) {
                $body = $response->json();

                // Obtener el texto generado
                $text = data_get($body, 'candidates.0.content.parts.0.text', 'No se obtuvieron consejos');

                // Convertir Markdown a HTML con negritas y saltos de línea
                $htmlTips = Str::markdown($text);

                return response()->json([
                    'tips' => $htmlTips // Ya viene como HTML renderizable
                ]);
            }

            return response()->json(['error' => 'Error en la API de Gemini', 'details' => $response->body()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener consejos', 'details' => $e->getMessage()], 500);
        }
    }
}
