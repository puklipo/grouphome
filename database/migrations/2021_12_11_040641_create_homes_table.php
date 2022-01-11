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
        Schema::create('homes', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->timestamps();

            $table->foreignId('pref_id')->constrained();

            $table->string('company')->index();
            $table->string('name')->index();
            $table->string('address')->index();
            $table->date('released_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homes');
    }
};
