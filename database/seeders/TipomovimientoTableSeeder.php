<?php

namespace Database\Seeders;

use App\Models\Tipomovimiento;
use Illuminate\Database\Seeder;

class TipomovimientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipomovimiento::create([
            'descripcion' => 'Entrada al almacen',
        ]);

        Tipomovimiento::create([
            'descripcion' => 'Salida del almacen',
        ]);
    }
}
