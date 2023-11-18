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
            $table->dropColumn('opendaytime');
            $table->dropColumn('clausedaytime');
            $table->dropColumn('allprice');
            
            $table->datetime('start_day');//行く日
            $table->datetime('end_day');//帰るひ
            $table->integer('all_price')->nullable();//総額
            
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
        });
    }
};
