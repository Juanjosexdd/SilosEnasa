<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ingreso_id")->nullable();
            $table->unsignedBigInteger("producto_id")->nullable();
            $table->unsignedBigInteger("almacen_id")->nullable();

            $table->integer('cantidad');
            $table->text('observacionp')->nullable();
            $table->text('ubicacion')->nullable();

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

            $table->foreign('ingreso_id')
                ->references('id')
                ->on('ingresos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->date('created_at');
            $table->date('updated_at');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ingreso');
    }
}
