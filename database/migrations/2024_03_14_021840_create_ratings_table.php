<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('rating_id');
            $table->unsignedBigInteger('movie_id');
            $table->foreign('movie_id')->references('movie_id')->on('movies');
            $table->string('movie_title');
            $table->string('username');
            $table->unsignedInteger('rating');
            $table->string('r_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
