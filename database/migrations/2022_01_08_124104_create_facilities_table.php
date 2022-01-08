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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();

            $table->foreignId('home_id')->constrained();

            $table->boolean('internet')->comment('インターネット有料')->default(false);
            $table->boolean('internet_free')->comment('インターネット無料')->default(false);
            $table->boolean('wifi')->comment('WiFi')->default(false);
            $table->boolean('aircon')->comment('エアコン')->default(false);
            $table->boolean('kitchen')->comment('キッチン')->default(false);
            $table->boolean('toilet')->comment('トイレ')->default(false);
            $table->boolean('bath')->comment('風呂')->default(false);
            $table->boolean('shower')->comment('シャワールーム')->default(false);
            $table->boolean('wash')->comment('洗濯機')->default(false);
            $table->boolean('tv')->comment('テレビ')->default(false);

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
        Schema::dropIfExists('facilities');
    }
};
