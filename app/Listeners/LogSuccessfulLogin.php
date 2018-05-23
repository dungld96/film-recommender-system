<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\FilmRecommenderModel;
use Illuminate\Support\Facades\Session;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //dd($event->user);
        $film_recom = new FilmRecommenderModel();
        $data = $film_recom->getRecommenderFilm();
        for ($i=0; $i < count($data) ; $i++) { 
            $movie_title = $data[$i]['title'];

            $movie_review = $film_recom->getMovieReview($movie_title);
            foreach ($movie_review as $key => $value) {
                $data[$i][$key] = $value;
            }
            
        }

        Session::push('film_recommender', $data);
        return redirect()->route('home');
    }
}
