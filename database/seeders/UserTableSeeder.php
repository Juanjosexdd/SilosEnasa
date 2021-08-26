<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Cargo;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'tipodocumento_id' => '1',
            'departamento_id'  => '4',
            'cargo_id'         => '3',
            'cedula' => '20391877',
            'name' => 'Juan Jose',
            'username' => 'juansoto',
            'slug' => 'juan-jose',
            'last_name' => ' Soto Peña',
            'email' => 'juanjosexdd7@gmail.com',
            'password' => 'juanjosexd'
        ])->assignRole('ADMINISTRADOR');

        User::create([
            'departamento_id'  => '4',
            'cargo_id'         => '3',
            'tipodocumento_id' => '1',
            'cedula' => '123456789',
            'name' => 'Admin',
            'username' => 'admin',
            'slug' => 'admin',
            'last_name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => 'admin'
        ])->assignRole('ADMINISTRADOR');

        User::create([
            'tipodocumento_id' => '1',
            'departamento_id'  => '4',
            'cargo_id'         => '3',
            'cedula' => '12345678',
            'name' => 'usuario',
            'username' => 'usuario',
            'slug' => 'usuario',
            'last_name' => 'Usuario',
            'email' => 'usuario@mail.com',
            'password' => 'usuario'
        ])->assignRole('USUARIO');

        User::create([
            'tipodocumento_id' => '1',
            'departamento_id' => '4',
            'cargo_id' => '3',
            'cedula' => '3456345',
            'name' => 'Pablo',
            'username' => 'pablobencomo',
            'slug' => 'pablo',
            'last_name' => 'Bencomo',
            'email' => 'Pablobencomo@mail.com',
            'password' => 'pablobencomo'
        ])->assignRole('ADMINISTRADOR');

        User::create([
            'tipodocumento_id' => '1',
            'departamento_id' => '4',
            'cargo_id' => '3',
            'cedula' => '45645645',
            'name' => 'Betania',
            'username' => 'Betania',
            'slug' => 'usuario',
            'last_name' => 'Paez',
            'email' => 'Betaniapaez@mail.com',
            'password' => 'betania'
        ])->assignRole('ADMINISTRADOR');

        User::create([
            'departamento_id'  => '4',
            'cargo_id'         => '3',
            'tipodocumento_id' => '1',
            'cedula' => '5463464',
            'name' => 'Cristian',
            'username' => 'cristian',
            'slug' => 'cristian',
            'last_name' => 'Daza',
            'email' => 'Cristiandaza@mail.com',
            'password' => 'cristian'
        ])->assignRole('ADMINISTRADOR');

        User::create([
            'departamento_id'  => '4',
            'cargo_id'         => '3',
            'tipodocumento_id' => '1',
            'cedula' => '25563569',
            'name' => 'Luis',
            'username' => 'luis',
            'slug' => 'luis',
            'last_name' => 'Yzarraga',
            'email' => 'luisyazarraga@gmail.com',
            'password' => 'yzarraga'
        ])->assignRole('ADMINISTRADOR');

            //para formatos

        User::create([
            'departamento_id'  => '1',
            'cargo_id'         => '1',
            'tipodocumento_id' => '1',
            'cedula' => '54634647',
            'name' => 'Jesus',
            'username' => 'jesus',
            'slug' => 'jesus',
            'last_name' => 'Cardozo',
            'email' => 'jesuscardozo@mail.com',
            'password' => 'jesus'
        ])->assignRole('ADMINISTRADOR');

        User::create([
            'departamento_id'  => '2',
            'cargo_id'         => '2',
            'tipodocumento_id' => '1',
            'cedula' => '255635698',
            'name' => 'Juan Manuel',
            'username' => 'juan-manuel',
            'slug' => 'luis',
            'last_name' => 'Jimenez',
            'email' => 'juanmanuel@gmail.com',
            'password' => 'juan'
        ])->assignRole('ADMINISTRADOR');
       // User::factory(99)->create();
    }
}
