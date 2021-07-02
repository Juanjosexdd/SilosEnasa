<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cargo;

class CargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::create([
            'nombre'      => 'Supervisor de tecnología de la información',
            'slug'        => 'supervisor-de-tecnología-de-la-información',
            'descripcion' => 'Supervisor de tecnología de la información',
            'estatus'     => '1'
        ]);
        
        Cargo::create([
            'nombre'      => 'Supervisor de laboratorios de control de calidad',
            'slug'        => 'supervisor-de-laboratorios-de-control-de-calidad',
            'descripcion' => 'Supervisor de laboratorios de control de calidad',
            'estatus'     => '1'
        ]);

        Cargo::create([
            'nombre'      => 'Supervisor de servicios generales',
            'slug'        => 'supervisor-de-servicios-generales',
            'descripcion' => 'Supervisor de servicios generales',
            'estatus'     => '1'
        ]);

        Cargo::create([
            'nombre'      => 'Supervisor de taller electromecanico',
            'slug'        => 'supervisor-de-taller-electromecanico',
            'descripcion' => 'Supervisor de taller electromecanico',
            'estatus'     => '1'
        ]);

        Cargo::create([
            'nombre'      => 'Supervisor modulo A',
            'slug'        => 'supervisor-modulo-a',
            'descripcion' => 'Supervisor del modulo A',
            'estatus'     => '1'
        ]);
        
        Cargo::create([
            'nombre'      => 'Supervisor modulo B',
            'slug'        => 'supervisor-modulo-b',
            'descripcion' => 'Supervisor del modulo B',
            'estatus'     => '1'
        ]);

        Cargo::create([
            'nombre'      => 'Supervisor modulo C',
            'slug'        => 'supervisor-modulo-a',
            'descripcion' => 'Supervisor del modulo C',
            'estatus'     => '1'
        ]);

        Cargo::create([
            'nombre'      => 'Supervisor modulo D',
            'slug'        => 'supervisor-modulo-d',
            'descripcion' => 'Supervisor del modulo D',
            'estatus'     => '1'
        ]);

        Cargo::create([
            'nombre'      => 'Supervisor modulo D',
            'slug'        => 'supervisor-modulo-E',
            'descripcion' => 'Supervisor del modulo D',
            'estatus'     => '1'
        ]);

        Cargo::create([
            'nombre'      => 'Supervisor modulo E',
            'slug'        => 'supervisor-modulo-e',
            'descripcion' => 'Supervisor del modulo E',
            'estatus'     => '1'
        ]);


    }
}
