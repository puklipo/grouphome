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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('home_id')->constrained()->cascadeOnDelete();

            $table->string('cover')->comment('カバー')->nullable();
            $table->string('building')->comment('建物')->nullable();
            $table->string('living')->comment('リビング')->nullable();
            $table->string('kitchen')->comment('キッチン')->nullable();
            $table->string('dining')->comment('食堂')->nullable();
            $table->string('food')->comment('食事例')->nullable();
            $table->string('bath')->comment('風呂')->nullable();
            $table->string('wash')->comment('洗濯機')->nullable();
            $table->string('toilet')->comment('トイレ')->nullable();
            $table->string('room')->comment('居室')->nullable();
            $table->string('internet')->comment('ネット設備')->nullable();

            $table->string('etc1')->comment('その他1')->nullable();
            $table->string('etc2')->comment('その他2')->nullable();
            $table->string('etc3')->comment('その他3')->nullable();
            $table->string('etc4')->comment('その他4')->nullable();
            $table->string('etc5')->comment('その他5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
};
