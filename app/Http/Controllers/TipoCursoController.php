<?php

namespace App\Http\Controllers;

use App\Models\TipoCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Js;
use Illuminate\Support\Facades\Log;


class TipoCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.tipo_curso.index');
    }

    public function search(Request $request)
    {
        $busqueda=$request->get('busqueda', '');
        // select * from tipo_curso where nombre like '%nuevo%' and delete_at IS NULL
        $listado = TipoCurso::where('nombre', 'LIKE', '%' . $busqueda . '%')->get();
        return view ('dashboard.tipo_curso.search', [
            'listado' => $listado
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tipo_curso.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'nombre' => 'required|min:5|max:20',
            'descripcion' => 'required',
            'abreviatura' => 'required|max:10',
        ]);
        if($validator->fails()){
            $data = [
                'message' => 'Error en los datos',
                'errors' => $validator->errors()
            ];
            return response()->json($data, 422);
        }
        try{
            $tipo_curso =new TipoCurso();
            $tipo_curso->nombre = $request->nombre;
            $tipo_curso->descripcion = $request->descripcion;
            $tipo_curso->activo = ($request->activo === "1") ? true : false;
            $tipo_curso->abreviatura = $request->abreviatura;
            $tipo_curso-> save();

            $data = ['message' => 'Tipo de curso registrado correctamente'];
            return response()->json($data, 201); //create
        }catch(\Throwable $error){
            Log::error($error->getMessage());

            $data = ['message' => 'Error al intentar guardar tipo de curso'];
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
        try{
            $tipo_curso = TipoCurso::find($id);
            if(is_null($tipo_curso)){
                $data = ['message' => 'Tipo de curso no existe'];
                return response()->json($data, 404);
            }
            return view ('dashboard.tipo_curso.edit',[
                'registro' => $tipo_curso
            ]);
        } catch(\Throwable $error){

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|min:5|max:20',
            'descripcion' => 'required',
            'abreviatura' => 'required|max:10',
        ]);
        if($validator->fails()){
            $data = [
                'message' => 'Error en los datos',
                'errors' => $validator->errors()
            ];
            return response()->json($data, 422);
        }
        try{
            $tipo_curso = TipoCurso::find($id);
            if(is_null($tipo_curso)){
                $data = ['message' => 'Tipo de curso no existe'];
                return response()->json($data, 404);
            }
            $tipo_curso->nombre = $request->nombre;
            $tipo_curso->descripcion = $request->descripcion;
            $tipo_curso->activo = ($request->activo === "1") ? true : false;
            $tipo_curso->abreviatura = $request->abreviatura;
            $tipo_curso-> save();

            $data = ['message' => 'Tipo de curso actualizado correctamente'];
            return response()->json($data, 200); //create
        }catch(\Throwable $error){
            Log::error($error->getMessage());

            $data = ['message' => 'Error al intentar actualizar tipo de curso'];
            return response()->json($data, 500); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $tipo_curso = TipoCurso::find($id);
            if(is_null($tipo_curso)){
                $data = ['message' => 'Tipo de curso no existe'];
                return response()->json($data, 404);
            }
            //$tipo_curso->forceDelete();  //elimina completamente
            $tipo_curso->forceDelete();   //delete_at

            $data = ['message' => 'Tipo de curso eliminado correctamente'];
            return response()->json($data, 200); //create
        } catch (\Throwable $error) {
            Log::error($error->getMessage());

            $data = ['message' => 'Error al intentar eliminar tipo de curso'];
            return response()->json($data, 500); 
        }
    }
}
