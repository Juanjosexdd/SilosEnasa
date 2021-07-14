<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTriggerAnularIngreso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER tr_updCantidadAnular AFTER UPDATE ON ingresos
            FOR EACH ROW BEGIN
                UPDATE productos p
                JOIN detalle_ingreso di
                ON di.producto_id = p.id
                AND di.ingreso_id = NEW.id
                SET p.stock = p.stock - di.cantidad;

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
        DB::unprepared('DROP TRIGGER `tr_updCantidadAnular`');
    }
}
