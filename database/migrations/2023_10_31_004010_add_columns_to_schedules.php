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
        Schema::table('schedules', function (Blueprint $table) {
            //
            $table->string('start_place')->nullable();//出発場所
            $table->string('end_place')->nullable();//到着場所
            $table->string('item')->nullable();
            $table->string('way')->nullable();


            $table->string('place')->nullable()->change();//行く日
            $table->integer('cost')->nullable()->change();//帰るひ
            $table->time('required_time')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            //
            $table->dropColumn('start_place');
            $table->dropColumn('end_place');
            $table->dropColumn('item');
            $table->dropColumn('way');
        });
    }
};
