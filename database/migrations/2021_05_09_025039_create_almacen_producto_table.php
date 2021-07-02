<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen_producto', function (Blueprint $table) {
            $table->id();
            $table->string('existencia')->nullable();

            $table->unsignedBigInteger('producto_id')->nullable();
            $table->unsignedBigInteger('almacen_id')->nullable();
            
            $table->foreign('producto_id')
                  ->references('id')
                  ->on('productos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('almacen_id')
                  ->references('id')
                  ->on('almacens')
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
        Schema::dropIfExists('almacen_producto');
    }
}
