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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');//旅行プランの題名
            $table->datetime('opendaytime');//行く日
            $table->datetime('clausedaytime');//帰るひ
            $table->integer('allprice');//総額　　各予定のテーブルに費用のカラムを作りそれを足し算して表示する
            $table->string('comment');//感想など
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
        Schema::dropIfExists('plans');
    }
};
