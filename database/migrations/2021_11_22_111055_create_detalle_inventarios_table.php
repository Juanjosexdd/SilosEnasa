<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_inventarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("inventario_id");
            $table->unsignedBigInteger("producto_id");
            $table->string('cantidad');


            $table->foreign('producto_id')
                ->references('id')
                ->on('productos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('inventario_id')
                ->references('id')
                ->on('inventarios')
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
        Schema::dropIfExists('detalle_inventarios');
    }
}
