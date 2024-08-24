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
            'curriculums_id' => 1,
            'users_id' => 1,
            'clear_flg' => 1
        ];
        DB::table('curriculum_progress')->insert($curriculum_progress_params);

        $curriculum_progress_params = [
            'id' => 2,
            'curriculums_id' => 2,
            'users_id' => 1,
            'clear_flg' => 0
        ];
        DB::table('curriculum_progress')->insert($curriculum_progress_params);


        $curriculum_progress_params = [
            'id' => 3,
            'curriculums_id' => 3,
            'users_id' => 1,
            'clear_flg' => 0
        ];
        DB::table('curriculum_progress')->insert($curriculum_progress_params);


        $curriculum_progress_params = [
            'id' => 4,
            'curriculums_id' => 4,
            'users_id' => 1,
            'clear_flg' => 0
        ];
        DB::table('curriculum_progress')->insert($curriculum_progress_params);

        
        $curriculum_progress_params = [
            'id' => 5,
            'curriculums_id' => 5,
            'users_id' => 1,
            'clear_flg' => 0
        ];
        DB::table('curriculum_progress')->insert($curriculum_progress_params);


        $curriculum_progress_params = [
            'id' => 6,
            'curriculums_id' => 6,
            'users_id' => 1,
            'clear_flg' => 0
        ];
        DB::table('curriculum_progress')->insert($curriculum_progress_params);
    }
}
