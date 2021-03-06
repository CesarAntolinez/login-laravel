<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('users')->insert([
           'cedula'     => "123456789987",
           'nombre'     => "Administrador",
           'telefono'   => 123456789,
           'correo'     => 'administrador@gmail.com',
           'status'     => 1,
           'password'   => Hash::make('password'),
       ]);
    }
}
