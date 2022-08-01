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
                'map_link' => 'https://www.google.com.uy/maps/place/Colegio+Maturana/@-34.8727793,-56.2030818,17z/data=!4m5!3m4!1s0x959f8001a9984a2d:0x3925feb3a7d4e430!8m2!3d-34.8727177!4d-56.2011828?hl=es-419',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'Colegio Zorrilla',
                'address' => 'José Ellauri 527, 11300 Montevideo',
                'map_link' => 'https://www.google.com.uy/maps/place/Colegio+Juan+Zorrilla+de+San+Mart%C3%ADn+-+Maristas/@-34.9210708,-56.1577908,18z/data=!4m5!3m4!1s0x959f817616d2f621:0x5eb1117d0417b213!8m2!3d-34.9209476!4d-56.1582234?hl=es-419',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'name' => 'Colegio San Ignacio',
                'address' => 'Alejo Rosell y Rius 1641, 11600 Montevideo',
                'map_link' => 'https://www.google.com.uy/maps/place/Colegio+San+Ignacio+-+Mons.+Isasa/@-34.8974492,-56.14751,18z/data=!4m5!3m4!1s0x959f811b4f6c0f7d:0x6e413c229f3bab38!8m2!3d-34.8974382!4d-56.1469441?hl=es-419',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'name' => 'Colegio Stella Maris',
                'address' => 'Gral. Máximo Tajes 7359, 11500 Montevideo',
                'map_link' => 'https://www.google.com.uy/maps/place/Colegio+Stella+Maris/@-34.8746305,-56.0466259,17z/data=!3m1!4b1!4m5!3m4!1s0x959f87896bdcf8ad:0xac5acdacfa6e4aa8!8m2!3d-34.8746305!4d-56.0444372?hl=es-419',
                'created_at' => Carbon::now()
            ]            
        ]);
    }
}
