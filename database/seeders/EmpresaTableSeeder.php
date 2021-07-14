<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'tipodocumento_id'  => '4',
            'rif'               => '00037398-1',
            'nombre'            => 'Empresa nacional de sistemas de silos S.A (ENASA)',
            'slug'              => 'empresa-nacional-de-sistemas-de-silos-s-a-enasa',
            'direccion'         => 'Rio Acarigua, Edo. Portuguesa',
            'telefono'          => '0255-000000',
            'celular'           => '0400-000000',
            'correo'            => 'ENASA@GMAIL.COM',
            'representante'     => 'Luis Yzarraga',
            'rif_representante' => '000000000',
        ]);
    }
}
