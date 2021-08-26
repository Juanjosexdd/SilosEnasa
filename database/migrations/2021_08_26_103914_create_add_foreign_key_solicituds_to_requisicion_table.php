<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddForeignKeySolicitudsToRequisicionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisicions', function (Blueprint $table) {
            $table->unsignedBigInteger("solicitud_id")->after('id')->nullable();
            $table->unsignedBigInteger("empleado_id")->after('solicitud_id')->nullable();
            
            $table->foreign('empleado_id')
                  ->references('id')
                  ->on('empleados')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('solicitud_id')
                  ->references('id')
                  ->on('solicituds')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_foreign_key_solicituds_to_requisicion');
    }
}
