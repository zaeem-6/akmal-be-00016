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
        Schema::table('movies', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->string('genre')->nullable()->change();
            $table->string('duration')->nullable()->change();
            $table->string('views')->nullable()->change();
            $table->string('posters')->nullable()->change();
            $table->string('overall_rating')->nullable()->change();
            $table->string('description')->nullable()->change();
            $table->string('theater_name')->nullable()->change();
            $table->datetime('start_time')->nullable()->change();
            $table->datetime('end_time')->nullable()->change();
            $table->integer('theater_room_no')->nullable()->change();
            $table->string('performer_name')->nullable()->change();
            $table->date('release_date')->nullable()->change();
            $table->integer('length')->nullable()->change();
            $table->string('mpaa_rating')->nullable()->change();
            $table->string('director')->nullable()->change();
            $table->string('language')->nullable()->change();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
