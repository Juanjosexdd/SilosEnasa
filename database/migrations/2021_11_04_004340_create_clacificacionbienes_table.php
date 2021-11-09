<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClacificacionbienesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clacificacionbienes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug');
            $table->string('abreviado');
            $table->string('descripcion');
            $table->boolean('estatus')->default(1);
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
        Schema::dropIfExists('clacificacionbienes');
    }
}
