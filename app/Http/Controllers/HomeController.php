<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FilmRecommenderModel;
use App\MoviesModel;
use App\User;
use App\RatingModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function register_save(Request $request)
    
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        

        $user->save();
        return redirect()->route('login');
    }
    

    
    public function index(Request $request)
    {
        $data = $request->session()->all();

        if(isset($data['film_recommender'])){
            $data = $data['film_recommender'][0];
        }
        

        $FilmRecommenderModel = new FilmRecommenderModel();
        // $movie_review = $FilmRecommenderModel->getMovieReview('The Kid (1921)');
        // dd($movie_review);
        // 
        // for ($i=0; $i < count($data) ; $i++) { 
        //     $movie_title = $data[$i]['title'];

        //     $movie_review = $FilmRecommenderModel->getMovieReview($movie_title);
        //     foreach ($movie_review as $key => $value) {
        //         $data[$i][$key] = $value;
        //     }

        // }

        //Session::push('film_data_index', $data);

        
        return view('index')->with('data', $data);
    }

    public function single(Request $request, $movie_id)
    {
        $data = $request->session()->all();

        if(isset($data['film_recommender'])){
            $data = $data['film_recommender'][0];
            foreach ($data as $movie) {
                if($movie['movieId'] == $movie_id ){
                    $movieSingle = $movie;
                }
                
            }
        }
        if(empty($movieSingle)){
            $movieModal = new MoviesModel();
            $movieSingle = $movieModal->where('movieId', $movie_id)->first()->toArray();
        }
        $user_id = Auth::user()->id;
        $RatingModel = new RatingModel();
        $ratingData = $RatingModel->where('movieId', $movie_id)->where('userId', $user_id)->first();
        if ($ratingData) {
           $ratingReal = $ratingData['rating'];
        }else{
            $ratingReal = null;
        }
        return view('single')->with('movieSingle', $movieSingle)
                            ->with('data', $data)
                            ->with('ratingReal', $ratingReal);
    }

    public function allMovies(Request $request)
    {
        $MoviesModel = new MoviesModel();
        $objMovies = $MoviesModel->paginate(24);


        $data = $request->session()->all();

        if(isset($data['film_recommender'])){
            $data = $data['film_recommender'][0];
        }

        return view('movies', ['objMovies' => $objMovies, 'data' => $data]);
    }
    
}
