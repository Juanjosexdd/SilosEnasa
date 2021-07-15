<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleEgresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_egreso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("egreso_id")->nullable();
            $table->unsignedBigInteger("producto_id")->nullable();
            $table->unsignedBigInteger("almacen_id")->nullable();

            $table->integer('cantidad');
            $table->text('observacion')->nullable();
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

            $table->foreign('egreso_id')
                  ->references('id')
                  ->on('egresos')
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
        Schema::dropIfExists('detalle_egreso');
    }
}
