<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("tipodocumento_id");
            $table->string('rif')->unique();
            $table->string("nombre", 180);
            $table->string("slug", 180);
            $table->string("direccion", 240);
            $table->string("telefono", 20);
            $table->string("celular", 20);
            $table->string('correo',50);
            $table->string("representante" ,180);
            $table->string("rif_representante", 120);
            $table->string("file")->nullable();

            $table->foreign('tipodocumento_id')
                  ->references('id')
                  ->on('tipodocumentos')
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
        Schema::dropIfExists('empresas');
    }
}
