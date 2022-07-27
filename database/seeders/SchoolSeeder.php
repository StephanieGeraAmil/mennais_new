<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('schools')->insert([
            [
                'id' => 1,
                'name' => 'Colegio Maturana',
                'address' => 'Bv. Gral. Artigas 4365, 11800 Montevideo',
                'map_link' => 'https://www.google.com/maps/dir/-34.8822627,-56.1477084/colegio+Maturana',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'Colegio Zorrilla',
                'address' => 'José Ellauri 527, 11300 Montevideo',
                'map_link' => 'https://www.google.com/maps/dir/-34.8822627,-56.1477084/colegio+Zorrilla',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'name' => 'Colegio San Ignacio',
                'address' => 'Alejo Rosell y Rius 1641, 11600 Montevideo',
                'map_link' => 'https://www.google.com/maps/dir/-34.8822627,-56.1477084/colegio+san+ignacio',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'name' => 'Colegio Stella Maris',
                'address' => 'Gral. Máximo Tajes 7359, 11500 Montevideo',
                'map_link' => 'https://www.google.com/maps/dir/-34.8822627,-56.1477084/colegio+stella+maris',
                'created_at' => Carbon::now()
            ]            
        ]);
    }
}
