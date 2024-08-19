<?php

use App\Models\TipoCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::

//http://localhost/clase04/public/


//funcion anonima, clousure
//Route::get("", [\App\Http\Controllers\InicioController::class,'portada']);

//http://localhost/isilaravel/public/saludo?nombre=Juan&cargo=Director
// QUERY STRING => nombre=Juan&cargo-Director
//Route::get("saludo",[\App\Http\Controllers\InicioController::class,'saludo']);

// rutas con parametros 
// http://localhost/isilaravel/public/reportes/ventas/2024/mes/01
// http://localhost/isilaravel/public/reportes/ventas/2023/mes/02
// http://localhost/isilaravel/public/reportes/ventas/2025/mes/03

//Route::get("/reportes/ventas/{anio}/mes/{mes?}", function ($anio, $mes = 10) { 

   // return response ("Reporte de ventas del $anio mes $mes");

//});


//Route::get('/formulario-registro', function () {
   // $menu =['Usuarios', 'Registro','Productos', 'Ventas', 'Reportes'];

//return view('formulario-registro' ,[
    //"menu" => $menu
//]); 

//});


//Route::get('insertar', function(){
//$registro=new TipoCurso();
//$registro->nombre="Diplomado";
//$registro->save();
//});


//Route::get('dashboard',[\App\Http\Controllers\DashboardController::class,'index']);

//Route::get('dashboard/tipo_curso',[\App\Http\Controllers\TipoCursoController::class,'index']);
//Route::get('dashboard/tipo_curso/search',[\App\Http\Controllers\TipoCursoController::class,'search'])->name('tipo_curso.search');
//Route::resource('dashboard/tipo_curso', \App\Http\Controllers\TipoCursoController::class);


//Route::get('dashboard/curso/search',[\App\Http\Controllers\CursoController::class,'search'])->name('curso.search');
//Route::resource('dashboard/curso', \App\Http\Controllers\CursoController::class);
