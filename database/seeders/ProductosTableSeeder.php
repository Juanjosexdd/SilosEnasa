<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'clacificacion_id' => '7',
            'nombre' => 'Extintor CO2',
            'slug' => 'extintor-co2',
            'descripcion' => 'Extintor CO2',
            'almacen_id' => '2'
        ]);

        Producto::create([
            'clacificacion_id' => '7',
            'nombre' => 'Extintor PQS',
            'slug' => 'extintor-pqs',
            'descripcion' => 'Extintor PQS',
            'almacen_id' => '1'
        ]);

        Producto::create([
            'clacificacion_id' => '8',
            'nombre' => 'Guaraña 83-BC-5200',
            'slug' => 'guarana',
            'descripcion' => 'Guaraña 83-BC-5200',
            'almacen_id' => '1'
        ]);

        Producto::create([
            'clacificacion_id' => '9',
            'nombre' => 'Motosierra SPM 7200G',
            'slug' => 'motosierra-spm-7200g',
            'descripcion' => 'Motosierra SPM 7200G',
            'almacen_id' => '2'
        ]);
    }
}
