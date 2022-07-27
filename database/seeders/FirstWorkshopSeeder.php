<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FirstWorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('first_workshop_groups')->insert([
            [
                'id' => 1,
                'start_at' => '08:00',
                'end_at' => '10:00',
                'school_id' => 1,
                'capacity' => 30,
                'has_vacant' => true,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'start_at' => '08:00',
                'end_at' => '10:00',
                'school_id' => 2,
                'capacity' => 30,
                'has_vacant' => true,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'start_at' => '08:00',
                'end_at' => '10:00',
                'school_id' => 3,
                'capacity' => 30,
                'has_vacant' => true,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'start_at' => '08:00',
                'end_at' => '10:00',
                'school_id' => 4,
                'capacity' => 30,
                'has_vacant' => true,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
