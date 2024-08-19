<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         // create table tipo_curso (id BIG INT NOT NULL PRIMARY KEY AUTOINCREMENT)
         Schema::create('tipo_curso', function (Blueprint $table) {
            // definiendo las columnas
            $table->id(); //"id", "BIG INTEGER UNSIGNED", "Primary key", "Autoincrement"
            // $table->unsignedSmallInteger("id")->autoIncrement();
            $table->string('nombre', 50)->comment('Esta columna guarda el nombre del tipo de curso');
            $table->boolean('activo')->default(true);

            $table->timestamps();
            // SOLO SI TRABAJAMOS CON LOS MODELOS DE LARAVEL
            // created_at TIMESTAMP nullable -> fecha y hora del registro
            // updated_at TIMESTAMP nullable -> fecha y hora de la ultima actualizacion
            $table->softDeletes();
            // SOLO SI TRABAJAMOS CON LOS MODELOS DE LARAVEL
            // deleted_at TIMESTAMP nullable -> fecha y hora de la eliminacion
            // consultas
            // where deleted_at IS NULL -> automatico
            // select * from tipo_curso where estado <> 'E'

            //$table->primary(['id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_curso');
    }
};
