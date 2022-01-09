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
        Schema::table('equipment', function (Blueprint $table) {
            $table->boolean('internet')->comment('インターネット有料')->default(false);
            $table->boolean('internet_free')->comment('インターネット無料')->default(false);
            $table->boolean('wifi')->comment('WiFi')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipment', function (Blueprint $table) {
            $table->dropColumn(['internet', 'internet_free', 'wifi']);
        });
    }
};
