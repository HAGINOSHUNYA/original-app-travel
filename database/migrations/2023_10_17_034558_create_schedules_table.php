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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('event_category');//移動、観光、食事等
            $table->time('start_time');//開始時刻
            $table->time('end_time');//終了時刻
            $table->time('required_time');//所要時間
            $table->string('place');//場所
            $table->boolean('reservation');//予約状況　真・偽
            $table->integer('cost');//費用
            $table->foreignId('plan_id')->constrained()->cascadeOnDelete();//プランテーブルとのリレーション
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
        Schema::dropIfExists('schedules');
    }
};
