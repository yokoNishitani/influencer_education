<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_params = [
            'id' => 1,
            'name' => '太郎',
            'name_kana' =>'タロウ',
            'email' => 'taro@aaa',
            'password' => bcrypt('aaaaaaaa'),
            'grade_id' => 1
        ];
        DB::table('users')->insert($users_params);

        $users_params = [
            'id' => 2,
            'name' => '花子',
            'name_kana' =>'ハナコ',
            'email' => 'hanako@aaa',
            'password' => bcrypt('bbbbbbbb'),
            'grade_id' => 1
        ];
        DB::table('users')->insert($users_params);
        
    }
}
