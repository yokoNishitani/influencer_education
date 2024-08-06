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
            $table->unsignedBigInteger('grade_id')->default(1); // デフォルト値を設定
            $table->timestamps();
        });

        $default_value = DB::table('grades');
        $insert = [
            ['id' => 1, 'name' => '小学1年生', 'grade_id' => 1],
            ['id' => 2, 'name' => '小学2年生', 'grade_id' => 1],
            ['id' => 3, 'name' => '小学3年生', 'grade_id' => 1],
            ['id' => 4, 'name' => '小学4年生', 'grade_id' => 1],
            ['id' => 5, 'name' => '小学5年生', 'grade_id' => 1],
            ['id' => 6, 'name' => '小学6年生', 'grade_id' => 1],
            ['id' => 7, 'name' => '中学1年生', 'grade_id' => 1],
            ['id' => 8, 'name' => '中学2年生', 'grade_id' => 1],
            ['id' => 9, 'name' => '中学3年生', 'grade_id' => 1],
            ['id' => 10, 'name' => '高校1年生', 'grade_id' => 1],
            ['id' => 11, 'name' => '高校2年生', 'grade_id' => 1],
            ['id' => 12, 'name' => '高校3年生', 'grade_id' => 1],
        ];
        $default_value->insert($insert);
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
