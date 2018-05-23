<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\user;
use App\MoviesModel;
class AdminController extends Controller
{
	public function index()
	{
		return view('admin.dashboard');
	}
	public function getLogin()
	{
		return view('admin.login');
	}


	public function login(Request $request)
	{
		//dd('login');
		
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember) && $request->email == 'admin@admin')
		{

			return redirect(route('dashboard'));
		}else{
			return back()->with('msg', 'Sai tài khoản/mật khẩu');
		}
	}
	public function movies(Request $request)
	{
		$MoviesModel = new MoviesModel();
        $objMovies = $MoviesModel->paginate(24);


        $data = $request->session()->all();

        if(isset($data['film_recommender'])){
            $data = $data['film_recommender'][0];
        }

        return view('admin.movies', ['objMovies' => $objMovies, 'data' => $data]);
	}
	public function addMovie(Request $request)
	{
		$MoviesModel = new MoviesModel();
		$MoviesModel->movieId = $request->movieId;
		$MoviesModel->title = $request->title;
		$MoviesModel->genres = $request->genres;
		$MoviesModel->save();
		return redirect()->route('quan-ly-phim');
	}
	public function delete($movieId)
	{
		$deletedMovies = MoviesModel::where('movieId', $movieId)->delete();
		return redirect()->route('quan-ly-phim');
	}
	public function edit($movieId)
	{
		$movie = MoviesModel::where('movieId', $movieId)->first();
		return view('admin.edit', ['movie' => $movie]);
	}
	public function saveEdit(Request $request)
	{
		$movie = MoviesModel::where('movieId', $request->movieId)->first();
		$movie->title = $request->title;
		$movie->genres = $request->genres;
		$movie->save();
		return redirect()->route('quan-ly-phim');
	}
}
