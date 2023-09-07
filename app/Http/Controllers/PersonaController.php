<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PersonaController extends Controller
{
    public function Listar(Request $request){

        try{
            $response = Http::withHeaders([ "accept" => "application/json"]) 
                -> get(getenv("API_PERSONAS_URL"));

            $personas = json_decode($response -> body(), true);
            
            return view("listar",[ "personas" => $personas]);
        }
        catch(\Illuminate\Http\Client\ConnectionException $e){
            return response("No se pudo conectar con la API",500);
        }
    }

    public function Buscar(Request $request, $idPersona){

        $response = Http::withHeaders([ "accept" => "application/json"]) 
            -> get(getenv("API_PERSONAS_URL") . $idPersona);

        $persona = json_decode($response -> body(), true);

        if($response -> successful())
            return view("persona",[ "persona" => $persona]);

        return "No existe la persona.";
    }

    public function Eliminar(Request $request, $idPersona){

        $response = Http::withHeaders([ "accept" => "application/json"]) 
            -> delete(getenv("API_PERSONAS_URL") . $idPersona);

        if($response -> successful()){
            $respuesta = json_decode($response -> body(),true);
            return $respuesta['message'];
        }

        return "No existe la persona.";
    }

    public function Crear(Request $request){
        $datos = [
            "nombre" => $request -> post("nombre"),
            "apellido" => $request -> post("apellido")
        ];
        $response = Http::withHeaders([ "accept" => "application/json"]) 
        -> post(getenv("API_PERSONAS_URL"), $datos);
        
        if($response -> successful())
            return redirect("/personas")->with("creado",true);

        $error = json_decode($response -> body(),true);
        return "Hubo un problema: " . $error["result"];
    }
}
