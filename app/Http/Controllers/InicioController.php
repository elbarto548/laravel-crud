<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function portada(){
        return response("Error al consultar tus pedidos, contactar con soporte",404);

    }
    public function saludo(Request $peticion)
    {
        $nombre = $peticion->get('nombre', '-');
$cargo = $peticion->get('cargo', '*');

$saludo = "Bienvenido" . $cargo . " " . $nombre;

return response($saludo); 

    }

    
}
