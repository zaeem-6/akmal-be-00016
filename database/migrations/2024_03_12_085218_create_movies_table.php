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
        Schema::create('movies', function (Blueprint $table) {
            $table->id('movie_id');
            $table->string('title');
            $table->string('genre');
            $table->string('duration');
            $table->string('views');
            $table->string('posters');
            $table->string('overall_rating');
            $table->string('description');
            $table->string('theater_name');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->integer('theater_room_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
