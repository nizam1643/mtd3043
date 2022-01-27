<?php

namespace Database\Seeders;

use App\Models\M2Group;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class M2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m2 =  [
            [
              'group' => 'Aman',
              'group_code' => 'GG-01',
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'group' => 'Bestari',
                'group_code' => 'GG-02',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'group' => 'Cemerlang',
                'group_code' => 'GG-03',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
          ];

          M2Group::insert($m2);
    }
}
