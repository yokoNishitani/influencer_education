<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curriculum_progress', function (Blueprint $table) {
            // カラム名を変更
            $table->renameColumn('clear_fig', 'clear_flg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curriculum_progress', function (Blueprint $table) {
            // カラム名を元に戻す
            $table->renameColumn('clear_flg', 'clear_fig');
        });
    }
};
