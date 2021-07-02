<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Almacen;

class AlmacenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Almacen::create([
            'nombre' => 'Almacen principal',
            'slug' => 'almacen-principal',
            'descripcion' => 'Almacen principal'
        ]);

        Almacen::create([
            'nombre' => 'Almacen laboratorio',
            'slug' => 'almacen-laboratorio',
            'descripcion' => 'Almacen laboratorio'
        ]);
    }
}
