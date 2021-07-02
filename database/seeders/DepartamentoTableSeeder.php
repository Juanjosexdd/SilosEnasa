<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create([
            'nombre'      => 'Oficina de gestion administrativa',
            'slug'        => 'oficina-de-gestion-administrativa',
            'descripcion' => 'Oficina de gestion administrativa',
            'estatus'     => '1'
        ]);

        Departamento::create([
            'nombre'      => 'Oficina de tecnologias de la informacion',
            'slug'        => 'oficina-de-tecnologias-de-la-informacion',
            'descripcion' => 'Oficina de tecnologias de la informacion',
            'estatus'     => '1'
        ]);
        
        Departamento::create([
            'nombre'      => 'Oficina de consultoria juridica',
            'slug'        => 'oficina-de-consultoria-juridica',
            'descripcion' => 'Oficina de consultoria juridica',
            'estatus'     => '1'
        ]);

        Departamento::create([
            'nombre'      => 'Oficina de planificacion y presupuesto',
            'slug'        => 'oficina-de-planificacion-y-presupuesto',
            'descripcion' => 'Oficina de planificacion y presupuesto',
            'estatus'     => '1'
        ]);

        Departamento::create([
            'nombre'      => 'Oficina de gestion humana',
            'slug'        => 'oficina-de-gestion-humana',
            'descripcion' => 'Oficina de gestion humana',
            'estatus'     => '1'
        ]);

        Departamento::create([
            'nombre'      => 'Oficina de auditoria interna',
            'slug'        => 'oficina-de-auditoria-interna',
            'descripcion' => 'Oficina de auditoria interna',
            'estatus'     => '1'
        ]);

        Departamento::create([
            'nombre'      => 'Oficina de gestion comunicacional',
            'slug'        => 'oficina-de-gestion-comunicacional',
            'descripcion' => 'Oficina de gestion comunicacional',
            'estatus'     => '1'
        ]);

        Departamento::create([
            'nombre'      => 'Oficina de gestion al soberano',
            'slug'        => 'oficina-de-gestion-al-soberano',
            'descripcion' => 'Oficina de gestion al soberano',
            'estatus'     => '1'
        ]);

    }
}
