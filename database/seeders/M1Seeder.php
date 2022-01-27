<?php

namespace Database\Seeders;

use App\Models\M1Year;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class M1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        M1Year::create([
            'year' => '2022',
            'batch_code' => 'YG-22',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
