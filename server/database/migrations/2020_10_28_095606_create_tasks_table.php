<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    // 新しいテーブル、カラム、インデックスをデータベースへ追加する。
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {

            // 論文番号のテーブルを「id」とし、increments型（自動増分）指定。※laravel では、自動増分 id をincrementsで主キーに設定。
            $table->increments('id');

            // 論文タイトルのテーブルを「title」とし、string型（255文字まで）指定。
            $table->string('title');

            // 論文内容のテーブルを「body」とし、text型（256文字以上）指定。
            $table->text('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    // upメソッドが行った操作を元に戻す。
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
