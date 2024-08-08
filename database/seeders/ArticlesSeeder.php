<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles_params = [
            'id' => 1,
            'title' => '授業内容更新についてのおしらせ',
            'posted_date' => date('Y/m/d'),
            'article_contents' => 'お知らせの本文がここに入ります。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト'
        ];
        DB::table('articles')->insert($articles_params);
    }
}

