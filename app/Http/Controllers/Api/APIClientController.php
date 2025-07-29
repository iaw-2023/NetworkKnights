<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Response;

use Illuminate\Support\Facades\Hash;
class APIClientController extends Controller{

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => ['required','email'],
            'password' => ['required','string']
        ]);

        if ($validator->fails()){
            return response()->json(['error' => $validator->errors()],401);
        }

        if (!Auth::guard('client')->attempt($request->only(['email','password']))){
            return response()->json(['error' => 'Invalid email or password'],401);
        }  

        $cliente = Client::where('email', $request->email)->first();
        $cliente->setHidden(['created_at', 'updated_at']);
        $token = $cliente->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'cliente' => $cliente,
            'token' => $token
        ],200);
    }

    
    public function register(Request $request)
    {
       try{    
            // Validacion de los datos de entrada
            $request->validate([
                'name' => 'required | string | max:50',
                'surname' => 'required | string | max:50',
                'address' => 'required|string|max:50',
                'email' => 'required|email|unique:clients,email',
                'password' => 'required | string | min:6 | max:30'
            ], 
            [
                'nombre.required' => 'El nombre no puede ser vacío.',
                'nombre.string' => 'El nombre no tiene el formato adecuado.',
                'nombre.max' => 'El nombre ingresado es más extenso de lo permitido (30 caracteres).',

                'apellido.required' => 'El apellido no puede ser vacío.',
                'apellido.string' => 'El apellido no tiene el formato adecuado.',
                'apellido.max' => 'El apellido ingresado es más extenso de lo permitido (30 caracteres).',

                'email.required' => 'El email del cliente no puede ser vacio', 
                'email.email' => 'El email del cliente debe ser una dirección de correo válida',
                'email.unique' => 'Ya existe un cliente registrado con el email ingresado.',

                'password.required' => 'La contraseña no puede ser vacía.',
                'password.string' => 'La contraseña no tiene el formato adecuado.',
                'password.min' => 'La contraseña ingresado es más corta de lo permitido (6 caracteres).',
                'password.max' => 'La contraseña ingresado es más extenso de lo permitido (30 caracteres).',
            ]);

            // Creacion del nuevo cliente
            $cliente = new Client();
            $cliente -> name = $request -> name;
            $cliente -> surname = $request -> surname;
            $cliente -> address = $request -> address;
            $cliente -> role = "client";
            $cliente -> email = $request -> email;
            $cliente-> password = Hash::make($request->password);
            $cliente-> save();

            $cliente->setHidden(['created_at', 'updated_at']);
            
            $token = $cliente->createToken('myapptoken')->plainTextToken;
            return response()->json([
                'message' => 'Cliente registrado con éxito',
                'client' => $cliente,
                'token' => $token,
            ], 201);
            
        }catch(ValidationException $e){
            $errors = $e->validator->errors()->all();
            return response()->json(['errors' => $errors], 422);
         }
    }

    public function logout(Request $request){
        Auth::guard('client')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return $this->success([], "Sesion cerrada exitosamente");
    }

    public function showClientOrders(){
        $jsonResponse = null;

        $orders = Order::where('id_client', Auth::guard('clients')->user()->id)->get();     
        //$jsonResponse = PedidoResource::collection($orders);

        return $jsonResponse;
    }
}
