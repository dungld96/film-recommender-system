/**
 * Class xử lý chức năng phim
 */


function Js_Movie(baseUrl){
	this.baseUrl = baseUrl;
	this.urlPath = baseUrl;
}
Js_Movie.prototype.loadIndex = function(){

	var myClass = this;

	$(function(){
		myClass.getRecommenderFilm();
	});
}

Js_Movie.prototype.getRecommenderFilm = function(){
	var url = this.urlPath + '/get-recommend'
	var myClass = this;

	$.ajax({
		url: url,
		type: "GET",
		success: function(result{
			console.log(result);
		}
	});
}

