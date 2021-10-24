<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            //外部キー制約を結ぶことでrelationのある他のテーブルの変更を反映させることができる
            // onDelete('cascade')でusersのrecordが削除されるとそれに対応するpostsのrecordも削除される
            $table->string('name');
            $table->date('birthday');
            $table->tinyInteger('sex');
            $table->string('clinical_diagnosis');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
