<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Firebase\JWT\JWK;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class Auth0Middleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['error' => 'Token no proporcionado'], 401);
        }

        try {
            $jwksUrl = 'https://' . env('AUTH0_DOMAIN') . '/.well-known/jwks.json';
            $jwks = json_decode(file_get_contents($jwksUrl), true);
            $decodedToken = JWT::decode($token, JWK::parseKeySet($jwks));

            // Agregar el usuario autenticado a la request
            $request->attributes->add(['auth0_user' => $decodedToken]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Token inválido'], 401);
        }

        return $next($request);
    }
}
