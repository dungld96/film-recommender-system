<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RatingModel;
use Illuminate\Support\Facades\Auth;
use App\FilmRecommenderModel;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logout()
    {

        Session::forget('film_recommender');
        Auth::logout();

        return redirect('/');

    }
    

    public function rating(Request $request)
    {
        $rating = $request->rating_movie;
        $movieId = $request->movie_id;
        $userId = Auth::user()->id;
        $RatingModel = new RatingModel();
        $ratingMovie = $RatingModel->where('movieId', $movieId)->where('userId', $userId)->first();
        if($ratingMovie){
            $RatingModel->where('movieId', $movieId)->where('userId', $userId)->delete();
            $RatingModel->userId = $userId;
            $RatingModel->movieId = $movieId;
            $RatingModel->rating = $rating;
            $RatingModel->save();
        }else{
            $RatingModel->userId = $userId;
            $RatingModel->movieId = $movieId;
            $RatingModel->rating = $rating;
            $RatingModel->save();
        }
        
        return array('success' => true,'message' => "Đánh giá phim thành công");
    }
}
