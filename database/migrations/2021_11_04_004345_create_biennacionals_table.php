<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiennacionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biennacionals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug');
            $table->string('descripcion');
            $table->string('codigo');
            $table->decimal('costo', 11, 2)->nullable();
            $table->integer('vidautil')->nullable();
            $table->date('fecha_adquisicion')->nullable();
            $table->date('fecha_desincorporacion')->nullable();
            $table->text('observacion')->nullable();
            
            $table->boolean('estatus')->default();
            $table->unsignedBigInteger("clacificacionbienes_id");
            $table->foreign('clacificacionbienes_id')
                ->references('id')
                ->on('clacificacionbienes')
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
        Schema::dropIfExists('biennacionals');
    }
}
