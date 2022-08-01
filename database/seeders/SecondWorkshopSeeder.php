<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecondWorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('second_workshop_groups')->insert([
            [
                'id' => 1,
                'start_at' => '11:00',
                'end_at' => '13:00',
                'school_id' => 1,
                'capacity' => 30,
                'has_vacant' => true,
                'additional_text'=>'',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'start_at' => '13:00',
                'end_at' => '15:00',
                'school_id' => 2,
                'capacity' => 30,
                'has_vacant' => true,
                'additional_text'=>'Inicial y Primaria',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'start_at' => '11:00',
                'end_at' => '13:00',
                'school_id' => 3,
                'capacity' => 30,
                'has_vacant' => true,
                'additional_text'=>'',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'start_at' => '13:00',
                'end_at' => '15:00',
                'school_id' => 4,
                'capacity' => 30,
                'has_vacant' => true,
                'additional_text'=>'',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
