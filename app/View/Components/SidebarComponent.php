<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


class SidebarComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $nombre_usuario = Auth::user()->name;

        $ruta_actual=Route::currentRouteName();
        return view('components.sidebar-component',['ruta_actual'=>$ruta_actual, 'nombre_usuario'=>$nombre_usuario]);
    }
}
