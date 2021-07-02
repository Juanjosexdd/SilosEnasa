<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddFoireignKeyCargoAtUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->unsignedBigInteger("cargo_id")->after('departamento_id')->nullable();
            
            $table->foreign('cargo_id')
                  ->references('id')
                  ->on('cargos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('slug')->after('name');
            $table->string("cedula")->unique()->after('cargo_id')->nullable();
            $table->string("last_name")->after('name')->nullable();
            $table->string("username")->after('name')->nullable();
            $table->string("address")->after('last_name')->nullable();
            $table->string("phone")->after('address')->nullable();
            $table->string("phone2")->after('phone')->nullable();
            $table->boolean('estatus')->default(1)->after('phone2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_foireign_key_cargo_at_users');
    }
}
