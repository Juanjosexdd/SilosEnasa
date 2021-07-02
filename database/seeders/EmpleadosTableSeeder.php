<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Seeder;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empleado::create([
            'departamento_id'  => '2',
            'cargo_id'         => '1',
            'tipodocumento_id' => '1',
            'cedula' => '25563569',
            'nombres' => 'Luis',
            'slug' => 'luis',
            'apellidos' => 'Yzarraga',
            'celular' => '0424-5962528',
            'email' => 'luisyazarraga@gmail.com',
        ]);

        Empleado::create([
            'departamento_id'  => '2',
            'cargo_id'         => '1',
            'tipodocumento_id' => '1',
            'cedula' => '20391877',
            'nombres' => 'Juan jose',
            'slug' => 'juan-jose',
            'apellidos' => 'Soto Peña',
            'celular' => '0412-5205105',
            'email' => 'juanjosexdd7@gmail.com',
        ]);

    }
}
