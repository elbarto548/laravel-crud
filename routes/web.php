<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
  //  return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {

    Route::get('dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('dashboard/tipo_curso/search',[\App\Http\Controllers\TipoCursoController::class,'search'])->name('tipo_curso.search');
    Route::resource('dashboard/tipo_curso', \App\Http\Controllers\TipoCursoController::class);
    Route::get('dashboard/curso/search',[\App\Http\Controllers\CursoController::class,'search'])->name('curso.search');
    Route::resource('dashboard/curso', \App\Http\Controllers\CursoController::class);
});

require __DIR__.'/auth.php';





//Route::get('dashboard',[\App\Http\Controllers\DashboardController::class,'index']);

//Route::get('dashboard/tipo_curso',[\App\Http\Controllers\TipoCursoController::class,'index']);
//Route::get('dashboard/tipo_curso/search',[\App\Http\Controllers\TipoCursoController::class,'search'])->name('tipo_curso.search');
//Route::resource('dashboard/tipo_curso', \App\Http\Controllers\TipoCursoController::class);


//Route::get('dashboard/curso/search',[\App\Http\Controllers\CursoController::class,'search'])->name('curso.search');
//Route::resource('dashboard/curso', \App\Http\Controllers\CursoController::class);