<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionbiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacionbiens', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("empleado_id");
            $table->unsignedBigInteger("bienesnacionales_id");
            $table->unsignedBigInteger("user_id");
            $table->text('observacion')->nullable();
            $table->boolean('estatus')->default(1);


            $table->foreign('bienesnacionales_id')
                ->references('id')
                ->on('biennacionals')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('asignacionbiens');
    }
}
