<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTriggerAnularEgreso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER tr_updStockAnular AFTER UPDATE ON egresos
            FOR EACH ROW BEGIN
                UPDATE productos p
                JOIN detalle_egreso di
                ON di.producto_id = p.id
                AND di.egreso_id = NEW.id
                SET p.stock = p.stock + di.cantidad;

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
        DB::unprepared('DROP TRIGGER `tr_updStockAnular`');
    }
}
