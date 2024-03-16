<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function getAllMovies()
    {
        $allMovies = Movie::all();
        return response()->json(['data' => $allMovies]);
    }

    public function searchGenre(Request $request)
    {
        $genre = $request->query('genre');
        $movies = Movie::where('genre', 'like', '%' .$genre. '%')
        ->select('movie_id', 'title', 'genre', 'duration', 'views', 'posters', 'overall_rating', 'description')
        ->get();
        return response()->json(['data' => $movies]);
    }

    public function searchTimeSlot(Request $request)
    {
        $theater_name = $request->query('theater_name');
        $start_time = $request->query('start_time');
        $end_time = $request->query('end_time');
        $movies = Movie::where('theater_name', 'like', '%' .$theater_name. '%')
        ->where('start_time', '>=', $start_time)
        ->where('end_time', '<=', $end_time)
        ->select('movie_id', 'title', 'duration', 'views', 'genre', 'posters', 'overall_rating', 'theater_name', 'start_time', 'end_time', 'description', 'theater_room_no')
        ->get();
        return response()->json(['data' => $movies]);
    }

    public function searchMovieTheater(Request $request)
    {
        $theater_name = $request->query('theater_name');
        $d_date = $request->query('d_date');
        $movies = Movie::where('theater_name', 'like', '%' .$theater_name. '%')
        ->whereDate('start_time', $d_date)
        ->select('movie_id', 'title', 'duration', 'views', 'genre', 'posters', 'overall_rating', 'theater_name', 'start_time', 'end_time', 'description', 'theater_room_no')
        ->get();
        return response()->json(['data' => $movies]);
    }

    public function searchPerformer(Request $request)
    {
        $performer_name = $request->query('performer_name');
        $movies = Movie::where('performer_name', 'like', '%' .$performer_name. '%')
        ->select('movie_id', 'overall_rating', 'title', 'description', 'duration', 'views', 'genre', 'posters')
        ->get();
        return response()->json(['data' => $movies]);

    }

    public function newMovies(Request $request)
    {
        $r_date = $request->query('r_date');
        $movies = Movie::where('release_date', '<=', $r_date)
        ->orderBy('release_date', 'desc')
        ->select('movie_id', 'title', 'genre', 'duration', 'views', 'posters', 'overall_rating', 'description')
        ->get();
        return response()->json(['data' => $movies]);
    }

    public function addMovie(Request $request)
    {
        $movie_details = new Movie();

        $title = $request->input('title');
        $release = $request->input('release');
        $length = $request->input('length');
        $description = $request->input('description');
        $mpaa_rating = $request->input('mpaa_rating');
        $genres = $request->input('genre');
        $director = $request->input('director');
        $performer = $request->input('performer');
        $language = $request->input('language');

        $genreString = implode(', ', $genres);
        $directorString = implode(', ', $director);
        $performerString = implode(', ', $performer);
        $languageString = implode(', ', $language);

        $movie_details->title = $title;
        $movie_details->release_date = $release;
        $movie_details->length = $length;
        $movie_details->description = $description;
        $movie_details->mpaa_rating = $mpaa_rating;
        $movie_details->genre = $genreString;
        $movie_details->director = $directorString;
        $movie_details->performer_name = $performerString;
        $movie_details->language = $languageString;

        $movie_details->save();

        $movie = Movie::where('title', $title)->first();
        $movie_id = $movie->movie_id;

        return response()->json(['message' => "Successfully added review for $title with Movie_ID $movie_id", 'success' => true]);
    }

}
