<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\MoviesModel;

class FilmRecommenderModel extends Model
{
    public function getRecommenderFilm()
    {
    	$userId = Auth::user()->id;
        set_time_limit(300); 
        $client = new \Guzzle\Service\Client('http://127.0.0.1:5000/user/');
        $response = $client->get("$userId")->send(['timeout' => 100]);
        $data = $response->json();
        foreach ($data as $id) {
          $movie = MoviesModel::where('movieId',$id)->first();
          $ArrMovieInfo['movieId'] =  $movie->movieId;
          $ArrMovieInfo['title'] =  $movie->title;
          $ArrMovieInfo['genres'] =  $movie->genres;
          $result[] = $ArrMovieInfo;
      }
      return $result;
  }

  public function getMovieReview($movie_title)
  {
    $key = 'AIzaSyB59Qa9c2flnrfYJd6skDdC3hUQrxTwG9U';
    $url = 'https://www.googleapis.com/customsearch/v1?q='. $movie_title .'&key='. $key .'&cx=001221401184127685701:lhx1egpkubo';
        //dd($url);
    $client = new \Guzzle\Service\Client($url);
    $response = $client->get('')->send();
    $response = $response->json();

    $data = [];
    $data['link'] = $response['items'][0]['link'];

    
    if (isset($response['items'][0]['pagemap']['movie'][0]['datepublished'])) {
        $data['datepublished'] = $response['items'][0]['pagemap']['movie'][0]['datepublished'];
    }

    
    if (isset($response['items'][0]['pagemap']['movie'][0]['duration'])) {
        $data['duration'] = $response['items'][0]['pagemap']['movie'][0]['duration'];
    }

    
    if (isset($response['items'][0]['pagemap']['movie'][0]['image'])) {
        $data['image'] = $response['items'][0]['pagemap']['movie'][0]['image'];
    }

    if (isset($response['items'][0]['pagemap']['movie'][0]['trailer'])) {
        $data['trailer'] = $response['items'][0]['pagemap']['movie'][0]['trailer'];
    }
    if (isset($response['items'][0]['pagemap']['movie'][0]['keywords'])) {
        $data['keywords'] = $response['items'][0]['pagemap']['movie'][0]['keywords'];
    }
    
    
    if (isset($response['items'][0]['pagemap']['movie'][0]['description'])) {
        $data['description'] = $response['items'][0]['pagemap']['movie'][0]['description'];
    }
    
    
    if (isset($response['items'][0]['pagemap']['moviereview'][0]['directed_by'])) {
        $data['directed_by'] = $response['items'][0]['pagemap']['moviereview'][0]['directed_by'];
    }

    
    if (isset($response['items'][0]['pagemap']['moviereview'][0]['starring'])) {
        $data['starring'] = $response['items'][0]['pagemap']['moviereview'][0]['starring'];
    }
    
    return $data;
}
}
