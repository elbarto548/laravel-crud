<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\TipoCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Log;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.curso.index');
    }
public function search(Request $request){
    $busqueda = $request->get('busqueda', '');

    /*
    select curso. *, from curso
    inner join tipo_curso ON curso.tipo_curso_id = tipo_curso_id
    where curso.deleted_at IS NULL AND tipo_curso.deleted_at IS NULL
    
    
    */
    $listado = Curso::join('tipo_curso', 'curso.tipo_curso_id', '=', 'tipo_curso.id')
    ->whereNull('tipo_curso.deleted_at')
    ->select('curso.*', 'tipo_curso.nombre AS nombre_tipo_curso')
    ->where('curso.nombre', 'LIKE', '%' . $busqueda . '%')
    ->distinct() // Asegúrate de que esto no elimine registros necesarios
    ->get();

    return view('dashboard.curso.search', ['listado'=>$listado]);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipo_cursos = TipoCurso::where('activo', '=', true)->get();
    return view('dashboard.curso.create', ['tipo_cursos'=> $tipo_cursos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'tipo_curso_id' => 'required',
            'nombre' => 'required',
            'precio' => 'required',
            'imagen' => 'required|image|max:1024',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'descripcion' => 'required',
            
        ]);
        if($validation->fails()){
            $data = ['message'=> 'Error en los datos', 'errors'=> $validation->errors()];

            return response()->json($data, 422);
        }
        try {
            $curso = new Curso();
            $curso->tipo_curso_id = $request->tipo_curso_id;
            $curso->nombre = $request->nombre;
            $curso->precio = $request->precio;
            $curso->imagen = $request->imagen->store("public/cursos");
            $curso->fecha_inicio = $request->fecha_inicio;
            $curso->fecha_fin = $request->fecha_fin;
            $curso->descripcion = $request->descripcion;
            $curso->activo = ($request->activo=="1") ? true : false;
            $curso->save();
            $data = ['message'=> 'Curso registrado correctamente'];

            return response()->json($data, 201);
        } catch (\Throwable $error) {
            
            Log::error($error->getMessage());
            $data = ['message'=> 'Error al intentar registrar curso'];

            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    try {
        $curso = Curso::find($id);
        if (is_null($curso)) {
            return response()->json(['message' => 'Curso no existe'], 404);
        }

        $tipo_cursos = TipoCurso::all(); //obtener también los tipos de curso

        return view('dashboard.curso.edit', [
            'registro' => $curso,
            'tipo_cursos' => $tipo_cursos // Envío de los tipos de curso a la vista
        ]);
    } catch (\Throwable $error) {
        return response()->json(['message' => 'Error al cargar la información'], 500);
    }
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $curso = Curso::find($id);
            if (is_null($curso)) {
                return response()->json(['message' => 'Curso no existe'], 404);
            }
    
            // Validación 
            $request->validate([
                'tipo_curso_id' => 'required|integer',
                'nombre' => 'required|string|max:255',
                'precio' => 'required|numeric',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date',
                'descripcion' => 'nullable|string',
                'activo' => 'nullable|boolean',
            ]);
    
            // Actualización del modelo
            $curso->tipo_curso_id = $request->tipo_curso_id;
            $curso->nombre = $request->nombre;
            $curso->precio = $request->precio;
            $curso->fecha_inicio = $request->fecha_inicio;
            $curso->fecha_fin = $request->fecha_fin;
            $curso->descripcion = $request->descripcion;
            $curso->activo = $request->activo ? 1 : 0;
    
            // Manejo de la imagen (si se envía una nueva imagen)
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen')->store('public/imagenes'); // Guarda la imagen en la carpeta pública
                $curso->imagen = $imagen;
            }
    
            $curso->save();
    
            return response()->json(['message' => 'Curso actualizado exitosamente'], 200);
    
        } catch (\Throwable $error) {
            return response()->json(['message' => 'Error al actualizar el curso'], 500);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $curso = Curso::find($id);
            if(is_null($curso)){
                $data = ['message' => 'Tipo de curso no existe'];
                return response()->json($data, 404);
            }
            //$tipo_curso->forceDelete();  //elimina completamente
            $curso->forceDelete();   //delete_at

            $data = ['message' => 'Tipo de curso eliminado correctamente'];
            return response()->json($data, 200); //create
        } catch (\Throwable $error) {
            Log::error($error->getMessage());

            $data = ['message' => 'Error al intentar eliminar tipo de curso'];
            return response()->json($data, 500); 
        }
    }
}
