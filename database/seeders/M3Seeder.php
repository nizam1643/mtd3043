<?php

namespace Database\Seeders;

use App\Models\M3Subject;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class M3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m3 =  [
            [
              'subject' => 'Bahasa Melayu',
              'subject_code' => 'SB-01',
              'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus elementum congue. Duis pellentesque sapien dolor. Praesent nec auctor ante.',
              'thumbnail' => 'documents/text.png',
              'year_id' => '1',
              'group_id' => '1',
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subject' => 'Bahasa Jepun',
                'subject_code' => 'SB-02',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus elementum congue. Duis pellentesque sapien dolor. Praesent nec auctor ante.',
                'thumbnail' => 'documents/text.png',
                'year_id' => '1',
                'group_id' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subject' => 'Sains Komputer',
                'subject_code' => 'SE-01',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus elementum congue. Duis pellentesque sapien dolor. Praesent nec auctor ante.',
                'thumbnail' => 'documents/text.png',
                'year_id' => '1',
                'group_id' => '3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
              ],
              [
                'subject' => 'Matematik',
                'subject_code' => 'ST-01',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus elementum congue. Duis pellentesque sapien dolor. Praesent nec auctor ante.',
                'thumbnail' => 'documents/text.png',
                'year_id' => '1',
                'group_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
              ],
          ];

          M3Subject::insert($m3);
    }
}
