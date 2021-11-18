<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("tipodocumento_id");

            $table->string('cedularif');
            $table->string('nombre');
            $table->string('slug');
            $table->string('direccion');
            $table->string('correo');
            $table->string('telefono');
            $table->text('observacion')->nullable();
            $table->boolean('estatus')->default(1);

            $table->foreign('tipodocumento_id')
                ->references('id')
                ->on('tipodocumentos')
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
        Schema::dropIfExists('proveedors');
    }
}
