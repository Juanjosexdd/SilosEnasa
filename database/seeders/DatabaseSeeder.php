<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AlmacenTableSeeder::class);
        $this->call(ClacificacionTableSeeder::class);
        $this->call(CargoTableSeeder::class);
        $this->call(DepartamentoTableSeeder::class);
        $this->call(TipodocumentoTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
        $this->call(EmpleadosTableSeeder::class);
        $this->call(ProductosTableSeeder::class);
        $this->call(ProveedorTableSeeder::class);
        $this->call(EmpresaTableSeeder::class);
        $this->call(TipomovimientoTableSeeder::class);
        
    }
}
