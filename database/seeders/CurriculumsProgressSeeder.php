<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurriculumsProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curriculum_progress_params = [
            'id' => 1,
            'curriculumus_id' => 1,
            'users_id' => 1,
            'clear_fig' => 1
        ];
        DB::table('curriculum_progress')->insert($curriculum_progress_params);

        $curriculum_progress_params = [
            'id' => 2,
            'curriculumus_id' => 2,
            'users_id' => 1,
            'clear_fig' => 0
        ];
        DB::table('curriculum_progress')->insert($curriculum_progress_params);
    }
}
