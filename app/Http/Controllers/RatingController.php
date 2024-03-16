<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Movie;

class RatingController extends Controller
{
    public function giveRating(Request $request)
    {

        $rating_details = new Rating();

        $rating = $request->input('rating');

        if($rating < 1 || $rating > 10)
        {
            return response()->json(['message' => 'Rating must be a numerical value ranging from 1-10'], 400);
        }

        $title = $request->input('movie_title');
        $movie = Movie::where('title','like', '%' .$title. '%')->first();

        if($movie)
        {
            $movie_id = $movie->movie_id;
            $movie_title = $movie->title;

            $rating_details->movie_id = $movie_id;
            $rating_details->movie_title = $movie_title;
            $rating_details->username = $request->input('username');
            $rating_details->rating = $rating;
            $rating_details->r_description = $request->input('r_description');
            $rating_details->save();

            $username = $request->input('username');

            return response()->json(['message' => "Successfully added review for $movie_title by user: $username", 'success' => true]);
            
        }
        else
        {
            
            return response()->json(['message' => 'Adding review fails', 'success' => false]);
        }
        

    }
}
