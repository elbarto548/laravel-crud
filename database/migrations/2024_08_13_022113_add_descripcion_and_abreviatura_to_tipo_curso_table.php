<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tipo_curso', function (Blueprint $table) {
            $table->text('descripcion')->nullable();
            $table->string('abreviatura', 10)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('tipo_curso', function (Blueprint $table) {
            $table->dropColumn('descripcion');
            $table->dropColumn('abreviatura');
        });
    }
    
};
