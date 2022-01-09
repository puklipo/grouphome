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
        Schema::table('facilities', function (Blueprint $table) {
            $table->boolean('house')->comment('戸建てタイプ')->default(false);
            $table->boolean('apartment')->comment('マンション・アパートタイプ')->default(false);

            $table->boolean('dining')->comment('食堂')->default(false);
            $table->boolean('living')->comment('リビング室')->default(false);

            $table->boolean('barrier_free')->comment('バリアフリー')->default(false);
            $table->boolean('pet')->comment('ペット可')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->dropColumn(['barrier_free', 'pet', 'dining', 'living', 'apartment', 'house']);
        });
    }
};
