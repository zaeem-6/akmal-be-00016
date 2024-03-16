<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RatingController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('movies', [MovieController::class, 'getAllMovies']);
Route::get('genre', [MovieController::class, 'searchGenre']);
Route::get('timeslot', [MovieController::class, 'searchTimeSlot']);
Route::get('specific_movie_theater', [MovieController::class, 'searchMovieTheater']);
Route::get('search_performer', [MovieController::class, 'searchPerformer']);
Route::post('give_rating', [RatingController::class, 'giveRating']);
Route::get('new_movies', [MovieController::class, 'newMovies']);
Route::post('add_movie', [MovieController::class, 'addMovie']);