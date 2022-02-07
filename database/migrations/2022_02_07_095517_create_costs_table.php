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
        Schema::create('costs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('home_id')->constrained()->cascadeOnDelete();

            $table->unsignedMediumInteger('total')->default(0)->comment('費用合計');
            $table->unsignedMediumInteger('rent')->default(0)->comment('家賃');
            $table->unsignedMediumInteger('food')->default(0)->comment('食費');
            $table->unsignedMediumInteger('utilities')->default(0)->comment('水道光熱費');
            $table->unsignedMediumInteger('daily')->default(0)->comment('日用品');
            $table->unsignedMediumInteger('etc')->default(0)->comment('その他');

            $table->unsignedMediumInteger('support')->default(10000)->comment('家賃補助');

            $table->text('message')->nullable()->comment('補足');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costs');
    }
};
