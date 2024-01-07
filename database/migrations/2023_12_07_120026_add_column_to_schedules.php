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
            $table->boolean('transfer_flag')->default(false);
            $table->string('train_name_1')->nullable();
            $table->string('train_name_2')->nullable();
            $table->string('train_name_3')->nullable();
            $table->string('train_name_4')->nullable();
           
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
            $table->dropColumn('transfer_flag');
            $table->dropColumn('train_name_1');
            $table->dropColumn('train_name_2');
            $table->dropColumn('train_name_3');
            $table->dropColumn('train_name_4');
        });
    }
};
