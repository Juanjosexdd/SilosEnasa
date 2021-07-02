<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'nombre'  => 'Amazonas',
            'slug'    => 'amazonas',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Anzoategui',
            'slug'    => 'anzoategui',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Apure',
            'slug'    => 'apure',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Aragua',
            'slug'    => 'aragua',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Barinas',
            'slug'    => 'barinas',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Bolivar',
            'slug'    => 'bolivar',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Carabobo',
            'slug'    => 'carabobo',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Cojedes',
            'slug'    => 'cojedes',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Delta amacuro',
            'slug'    => 'delta-amacuro',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Distrito capital',
            'slug'    => 'distrito-capital',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Falcon',
            'slug'    => 'falcon',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Guarico',
            'slug'    => 'guarico',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Lara',
            'slug'    => 'lara',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Merida',
            'slug'    => 'merida',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Miranda',
            'slug'    => 'miranda',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Monagas',
            'slug'    => 'monagas',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Nueva esparta',
            'slug'    => 'nueva-esparta',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Portuguesa',
            'slug'    => 'portuguesa',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Sucre',
            'slug'    => 'sucre',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Tachira',
            'slug'    => 'tachira',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Trujillo',
            'slug'    => 'trujillo',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Vargas',
            'slug'    => 'vargas',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Yaracuy',
            'slug'    => 'yaracuy',
            'estatus' => '1'
        ]);

        Estado::create([
            'nombre'  => 'Zulia',
            'slug'    => 'zulia',
            'estatus' => '1'
        ]);
       
    }
}
