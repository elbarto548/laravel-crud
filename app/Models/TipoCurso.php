<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoCurso extends Model
{
    use HasFactory;
    use SoftDeletes;  //sofdeletes() -> deleted-at

    protected $table='tipo_curso';
    //protected $connection='recursos_humanos'; //"principal"
    //public $primarykey='codigo'; // "id"
    //public$incrementing=false; //true
    //timestamp() -> created_at. updated_at
    //public $timestamp = false; //true
    //public $keyType ='string'; //int
   


    //TipoCurso -> Tipo_Curso -> tipo_curso -> "tipo_cursos"
    //Person -> Person -> person -> "people"
}
