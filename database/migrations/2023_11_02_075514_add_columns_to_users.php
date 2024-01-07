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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'postal_code')) {
                $table->string('postal_code')->nullable();
            }
            
            // 'address' という名前の列が存在しない場合に追加
            if (!Schema::hasColumn('users', 'address')) {
                $table->text('address')->nullable();
            }
            
            // 他の列の追加操作もここに追加
        
        });
    }

    /**
     * Reverse the migrations.
     * 
     * 
     * 
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
