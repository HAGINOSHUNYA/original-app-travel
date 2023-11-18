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
        Schema::table('plans', function (Blueprint $table) {
            //
            $table->integer('allprice')->nullable()->change();
            $table->string('comment')->nullable()->change();//感想など
            $table->datetime('opendaytime')->datetime('strt_time')->change();//行く日
            $table->datetime('clausedaytime')->datetime('end_time')->change();//帰るひ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            //
            $table->integer('allprice');
            $table->string('comment');
            $table->datetime('opendaytime');
            $table->datetime('clausedaytime');
            
        });
    }
};
