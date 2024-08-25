<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurriculumsSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        \App\Models\users::create([
            'title' => 'カリキュラム5',
            'thumbnail' =>'',
            'description' => '',
            'video_url' => '',
            'alway_delivery_flg' => '1',
            'grade_id' => '1',
        ]);
    }
}
