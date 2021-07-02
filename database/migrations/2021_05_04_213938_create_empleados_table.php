<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("departamento_id");
            $table->unsignedBigInteger("cargo_id");
            $table->unsignedBigInteger("tipodocumento_id");
            $table->string('cedula');
            $table->string('nombres');
            $table->string('slug');
            $table->string('apellidos');
            $table->string('email');
            $table->string('direccion')->nullable();
            $table->string('celular');
            $table->string('telefono')->nullable();
            $table->string('observacion')->nullable();
            $table->boolean('estatus')->default(1);

            
            $table->foreign('tipodocumento_id')
                  ->references('id')
                  ->on('tipodocumentos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  
            
            $table->foreign('cargo_id')
                        ->references('id')
                        ->on('cargos')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            
            $table->foreign('departamento_id')
                  ->references('id')
                  ->on('departamentos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
