<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTriggerEgresos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER tr_updStock AFTER INSERT ON detalle_egreso
            FOR EACH ROW BEGIN
                UPDATE productos SET stock = stock - NEW.cantidad
                WHERE productos.id = NEW.producto_id;
            END;
        ');
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_updStock`');
    }
}
