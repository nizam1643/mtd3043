<?php

namespace Database\Seeders;

use App\Models\M1Year;
use App\Models\User;
use App\Models\User_M3suject;
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
        $this->call([
            M1Seeder::class,
            M2Seeder::class,
            M3Seeder::class,
            M4Seeder::class,
        ]);

        User::factory(5000)->create();
        User_M3suject::factory(5000)->create();
    }
}
