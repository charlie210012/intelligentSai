<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class CredencialUnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Carlos Andres Arevalo Cortes',
            'identification'=>1144170160,
            'email'=>'carevalo@sidevtech.com',
            'password' => Hash::make(2205)
        ]);

        User::create([
            'name'=>'Ana Valentina Correcha Ochoa',
            'identification'=>1007442105,
            'email'=>'cochoa@sidevtech.com',
            'password' => Hash::make(2404)
        ]);

        User::create([
            'name'=>'Juan Guillermo Franco Carrillo',
            'identification'=>80859534,
            'email'=>'movix86@gmail.com',
            'password' => Hash::make(1234)
        ]);


    }
}
