<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clacificacion_id')->nullable();
            $table->string('nombre');
            $table->string('slug');
            $table->string('descripcion');
            $table->text('observacionp')->nullable();
            $table->text('ubicacion')->nullable();
            $table->text('marca')->nullable();
            $table->string('unidad_medida')->nullable();
            $table->string('maximo')->nullable();
            $table->string('minimo')->nullable();
            $table->integer('stock')->default(0);
            $table->boolean('estatus')->default(1);
            $table->boolean('almacen_id');

            $table->foreign('clacificacion_id')
                  ->references('id')
                  ->on('clacificacions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  $table->date('created_at');
                  $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
