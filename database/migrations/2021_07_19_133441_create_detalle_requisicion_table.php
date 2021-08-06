<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleRequisicionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_requisicion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("requisicion_id")->nullable();
            $table->unsignedBigInteger("producto_id")->nullable();
            $table->unsignedBigInteger("almacen_id")->nullable();
            
            $table->integer('cantidad');
            $table->text('observacionp')->nullable();
            $table->boolean('estatus')->default(1);

            
            $table->foreign('almacen_id')
                  ->references('id')
                  ->on('almacens')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('producto_id')
                  ->references('id')
                  ->on('productos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('requisicion_id')
                  ->references('id')
                  ->on('requisicions')
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
        Schema::dropIfExists('detalle_requisicion');
    }
}
