<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoviesModel extends Model
{
	protected $table = 'movies';
	public $timestamps = false;
	public $primaryKey = 'movieId';

}
