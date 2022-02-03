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
        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('home_id')->constrained()->cascadeOnDelete();

            $table->boolean('trial')->comment('体験利用必須')->default(false);
            $table->boolean('man')->comment('男性専用')->default(false);
            $table->boolean('woman')->comment('女性専用')->default(false);
            $table->boolean('mix')->comment('男女混合')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conditions');
    }
};
