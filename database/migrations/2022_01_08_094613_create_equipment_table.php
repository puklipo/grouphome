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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('home_id')->constrained()->cascadeOnDelete();

            $table->boolean('closet')->comment('クローゼット')->default(false);
            $table->boolean('aircon')->comment('エアコン')->default(false);
            $table->boolean('kitchen')->comment('キッチン')->default(false);
            $table->boolean('toilet')->comment('トイレ')->default(false);
            $table->boolean('bath')->comment('風呂')->default(false);
            $table->boolean('shower')->comment('シャワールーム')->default(false);
            $table->boolean('wash')->comment('洗濯機')->default(false);
            $table->boolean('tv')->comment('テレビ')->default(false);
            $table->boolean('furniture')->comment('家具付き')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment');
    }
};
