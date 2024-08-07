<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // 初期データの挿入
        $insert = [
            ['name' => '小学1年生'],
            ['name' => '小学2年生'],
            ['name' => '小学3年生'],
            ['name' => '小学4年生'],
            ['name' => '小学5年生'],
            ['name' => '小学6年生'],
            ['name' => '中学1年生'],
            ['name' => '中学2年生'],
            ['name' => '中学3年生'],
            ['name' => '高校1年生'],
            ['name' => '高校2年生'],
            ['name' => '高校3年生'],
        ];
        DB::table('grades')->insert($insert);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
};
