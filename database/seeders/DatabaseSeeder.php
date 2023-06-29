<?php

namespace Database\Seeders;

use App\Models\FirstWorkshopGroup;
use App\Models\SecondWorkshopGroup;
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
        $this->call([
            UserSeeder::class,
/*             SchoolSeeder::class,
            FirstWorkshopSeeder::class,
            SecondWorkshopSeeder::class,     */
        ]);
    }
}
