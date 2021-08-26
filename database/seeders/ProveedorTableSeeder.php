<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class ProveedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::create([
            'tipodocumento_id'  => '4',
            'cedularif'         => '00037398-2',
            'nombre'            => 'Coordinacion de compras (ENASA)',
            'slug'              => 'coordinacion-de-compras-enasa',
            'direccion'         => 'Rio Acarigua, Edo. Portuguesa',
            'correo'            => 'ENASA2@GMAIL.COM',
            'telefono'          => '0255-000000',
            'observacion'       => 'se dedica al almacenaje de cereales, granos y otros productos a granel, como parte del ciclo de acopio de la producción agrícola adscrita al Conglomerado Agroalimentario del Sur (Agrosur).'
        ]);
        Proveedor::create([
            'tipodocumento_id'  => '4',
            'cedularif'         => '00037398-1',
            'nombre'            => 'Empresa nacional de sistemas de silos S.A (ENASA)',
            'slug'              => 'empresa-nacional-de-sistemas-de-silos-s-a-enasa',
            'direccion'         => 'Rio Acarigua, Edo. Portuguesa',
            'correo'            => 'ENASA@GMAIL.COM',
            'telefono'          => '0255-000000',
            'observacion'       => 'se dedica al almacenaje de cereales, granos y otros productos a granel, como parte del ciclo de acopio de la producción agrícola adscrita al Conglomerado Agroalimentario del Sur (Agrosur).'
        ]);

        Proveedor::create([
            'tipodocumento_id'  => '4',
            'cedularif'         => '004556658-1',
            'nombre'            => 'Corporación de Desarrollo Agrícola, S.A.',
            'slug'              => 'corporacion-de-desarrollo-agricola, S.A.',
            'direccion'         => 'Rio Acarigua, Edo. Portuguesa',
            'correo'            => 'CDA@GMAIL.COM',
            'telefono'          => '0255-000000',
            'observacion'       => 'La Corporación de Desarrollo Agrícola, S.A., a su vez adscrita al Ministerio del Poder Popular para la Agricultura Productiva y Tierras.'
        ]);
    }
}
