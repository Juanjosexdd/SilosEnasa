<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clacificacion;

class ClacificacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clacificacion::create([
            'nombre'      => 'Herramientas',
            'slug'        => 'herramientas',
            'abreviado'   => 'HER',
            'descripcion' => 'Herramientas'
        ]);

        Clacificacion::create([
            'nombre'      => 'Mecanico',
            'slug'        => 'mecanico',
            'abreviado'   => 'MEC',
            'descripcion' => 'Mecanico'
        ]);

        Clacificacion::create([
            'nombre'      => 'Mantenimiento',
            'slug'        => 'mantenimiento',
            'abreviado'   => 'MAN',
            'descripcion' => 'Mantenimiento'
        ]);

        Clacificacion::create([
            'nombre'      => 'Plomeria',
            'slug'        => 'plomeria',
            'abreviado'   => 'PLO',
            'descripcion' => 'Plomeria'
        ]);

        Clacificacion::create([
            'nombre'      => 'Equipo protector',
            'slug'        => 'equipo-protector',
            'abreviado'   => 'EQP',
            'descripcion' => 'Equipo protector'
        ]);

        Clacificacion::create([
            'nombre'      => 'Electricidad',
            'slug'        => 'electricidad',
            'abreviado'   => 'ELC',
            'descripcion' => 'Electricidad'
        ]);    
        
        Clacificacion::create([
            'nombre'      => 'Extintor',
            'slug'        => 'extintor',
            'abreviado'   => 'EXT',
            'descripcion' => 'Extintor'
        ]);

        Clacificacion::create([
            'nombre'      => 'Guaraña',
            'slug'        => 'guarana',
            'abreviado'   => 'GUA',
            'descripcion' => 'Guaraña'
        ]);

        Clacificacion::create([
            'nombre'      => 'Motosierra',
            'slug'        => 'electricidad',
            'abreviado'   => 'MSI',
            'descripcion' => 'Motosierra'
        ]);

    }
}
