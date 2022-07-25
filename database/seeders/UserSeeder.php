<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'Leonel Goday',
            'email' => 'goday985@gmail.com',
            'password' => Hash::make('jl536635'),
            ],
            [
            'name' => 'Carlos Gera',
            'email' => 'cgerauy@gmail.com',
            'password' => Hash::make('c4rl05g3r4'),
            ],
            [
            'name' => 'ISF Admin',
            'email' => 'admin@isf.uy',
            'password' => Hash::make('admin1234'),
            ],
            [
            'name' => 'AUDEC',
            'email' => 'cursosaudec@gmail.com',
            'password' => Hash::make('4ud3c_proeducar'),
            ],
            [
            'name' => 'Acreditaciones',
            'email' => 'acreditaciones@audec.org',
            'password' => Hash::make('audec1234'),
            ]

        ]);
    }
}
