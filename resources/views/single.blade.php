 @extends('layouts.film')

@section('content')

<div class="container">
  <div class="container_wrap">
    <div class="header_top">
      <div class="col-sm-3 logo"><a href="{{ route('home') }}"><img src="{{asset('movie/images/logo.png')}}" alt=""/></a></div>
      <div class="col-sm-6 nav">
        <ul>
         <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="comic"><a href="#"> </a></span></li>
         <li><span class="simptip-position-bottom simptip-movable" data-tooltip="movie"><a href="{{ route('movies') }}"> </a> </span></li>
         <li><span class="simptip-position-bottom simptip-movable" data-tooltip="video"><a href="#"> </a></span></li>
         <li><span class="simptip-position-bottom simptip-movable" data-tooltip="game"><a href="#"> </a></span></li>
         <li><span class="simptip-position-bottom simptip-movable" data-tooltip="tv"><a href="#"> </a></span></li>
         <li><span class="simptip-position-bottom simptip-movable" data-tooltip="more"><a href="#"> </a></span></li>
       </ul>
     </div>
     <div class="col-sm-3 header_right">
       <ul class="header_right_box">
        <!-- Authentication Links -->
        @if (Auth::guest())
        <li><p><a href="{{ route('login') }}">Đăng nhập</a></p></li>
        <li><p>/</p></li>
        <li><p><a href="{{ route('register') }}">Đăng ký</a></p></li>
        @else
        <li class="dropdown">
          <p class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><a href="#" >
            {{ Auth::user()->name }} <span class="caret"></span>
          </a></p>

          <ul class="dropdown-menu" role="menu">
            <li>
              <p class="text-center"><a href="{{ route('logout') }}" class="logout">
                Đăng xuất
              </a></p>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
        @endif

        <div class="clearfix"> </div>
      </ul>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="content">
   <div class="movie_top">
     <div class="col-md-9 movie_box">
      <div class="grid images_3_of_2">
        <div class="movie_image">
          {{-- <span class="movie_rating">5.0</span> --}}
          <img src="{{empty($movieSingle['image']) ? asset('movie/images/single.jpg') : $movieSingle['image']}}" class="img-responsive" alt="" with="280"/>
        </div>
        <div class="movie_rate">
          <div class="rating_desc"><p>Your Vote :</p></div>
          <form id="formRatingMovie" action="{{ route('rating-movie') }}" method="POST" class="sky-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="rating_movie" id="rating_movie" value="">
            <input type="hidden" name="movie_id" id="movie_id" value="{{$movieSingle['movieId']}}">
            <fieldset>         
             <section>
              <div id="rateYo">
               {{-- <div class="rating"> --}}
                {{-- <input type="radio" name="stars-rating" id="stars-rating-5">
                <label for="stars-rating-5"><i class="icon-star"></i></label>
                <input type="radio" name="stars-rating" id="stars-rating-4">
                <label for="stars-rating-4"><i class="icon-star"></i></label>
                <input type="radio" name="stars-rating" id="stars-rating-3">
                <label for="stars-rating-3"><i class="icon-star"></i></label>
                <input type="radio" name="stars-rating" id="stars-rating-2">
                <label for="stars-rating-2"><i class="icon-star"></i></label>
                <input type="radio" name="stars-rating" id="stars-rating-1">
                <label for="stars-rating-1"><i class="icon-star"></i></label> --}}
                
              </div>
            </section>
          </fieldset>
        </form>
        <div class="clearfix"> </div>
      </div>
    </div>
    <div class="desc1 span_3_of_2">
      <!-- <p class="movie_option"><strong>Country: </strong><a href="#">established</a>, <a href="#">USA</a></p> -->
      <p class="movie_option"><strong>Tên phim: </strong>{{empty($movieSingle['title']) ? "No name" : $movieSingle['title']}}</p>
      <!-- <p class="movie_option"><strong>Category: </strong><a href="#">Adventure</a>, <a href="#">Fantazy</a></p> -->
      <p class="movie_option"><strong>Ngày phát hành: </strong>{{empty($movieSingle['datepublished']) ? "Không rõ" : $movieSingle['datepublished']}}</p>
      <!-- <p class="movie_option"><strong>Director: </strong><a href="#">suffered </a></p> -->
      <p class="movie_option"><strong>Nhóm thể loại: </strong>{{empty($movieSingle['genres']) ? "Không rõ" : $movieSingle['genres']}}</p>
      <p class="movie_option"><strong>Đạo diễn: </strong>{{empty($movieSingle['directed_by']) ? "Không rõ" : $movieSingle['directed_by']}}</p> 
      <p class="movie_option"><strong>Diễn viên chính: </strong>{{empty($movieSingle['starring']) ? "Không rõ" : $movieSingle['starring']}}</p>  
      <div class="down_btn"><a target="_blank" class="btn1" href="{{empty($movieSingle['trailer']) ? '#' : $movieSingle['trailer']}}"><span> </span>Trailer</a></div>
    </div>
    <div class="clearfix"> </div>
    <p class="m_4"><strong>Mô tả: </strong>{{empty($movieSingle['description']) ? "" : $movieSingle['description']}}</p>
    <p class="m_4"><strong>Từ khóa: </strong><a href="#">{{empty($movieSingle['keywords']) ? "" : $movieSingle['keywords']}}</a></p>
    <div class="single" style="padding-bottom: 20px;"">
      <form method="post" action="contact-post.html">
        <div class="to">
          <input type="text" class="text" value="Họ tên" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
          <input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" style="margin-left:3%">
        </div>
        <div class="text">
         <textarea value="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Bình luận:</textarea>
       </div>
       <div class="form-submit1">
         <input name="submit" type="submit" id="submit" value="Submit Your Message"><br>
       </div>
       <div class="clearfix"></div>
     </form>
   </div>

   <div class="single" style="padding-top: 20px; border-top: 1px solid #333;">
    <h2>10 Comments</h2>
    <ul class="single_list">
      <li>
        <div class="preview"><a href="#"><img src="{{asset('movie/images/2.jpg')}}" class="img-responsive" alt=""></a></div>
        <div class="data">
          <div class="title">Movie  /  2 hours ago  /  <a href="#">reply</a></div>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="clearfix"></div>
      </li>
      <li>
        <div class="preview"><a href="#"><img src="{{asset('movie/images/3.jpg')}}" class="img-responsive" alt=""></a></div>
        <div class="data">
          <div class="title">Wernay  /  2 hours ago  /  <a href="#">reply</a></div>
          <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent </p>
        </div>
        <div class="clearfix"></div>
      </li>
      <li>
        <div class="preview"><a href="#"><img src="{{asset('movie/images/4.jpg')}}" class="img-responsive" alt=""></a></div>
        <div class="data">
          <div class="title">mr.dev  /  2 hours ago  /  <a href="#">reply</a></div>
          <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram,</p>
        </div>
        <div class="clearfix"></div>
      </li>
      <li class="middle">
        <div class="preview"><a href="#"><img src="{{asset('movie/images/5.jpg')}}" class="img-responsive" alt=""></a></div>
        <div class="data-middle">
          <div class="title">Wernay  /  2 hours ago  /  <a href="#">reply</a></div>
          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
        </div>
        <div class="clearfix"></div>
      </li>
      <li class="last-comment">
        <div class="preview"><a href="#"><img src="{{asset('movie/images/6.jpg')}}" class="img-responsive" alt=""></a></div>
        <div class="data-last">
          <div class="title">mr.dev  /  2 hours ago  /  <a href="#">reply</a></div>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit </p>
        </div>
        <div class="clearfix"></div>
      </li>
      <li>
        <div class="preview"><a href="#"><img src="{{asset('movie/images/7.jpg')}}" class="img-responsive" alt=""></a></div>
        <div class="data">
          <div class="title">denpro  /  2 hours ago  /  <a href="#">reply</a></div>
          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
        </div>
        <div class="clearfix"></div>
      </li>
    </ul>
  </div>
</div>
<div class="col-md-3 movie-recom-left">
  <h3>Gợi ý dành cho bạn</h3>
      {{-- <div class="movie_img"><div class="grid_2">
        <img src="{{asset('movie/images/pic6.jpg')}}" class="img-responsive" alt="">
        <div class="caption1">
          <ul class="list_5 list_7">
            <li><i class="icon5"> </i><p>3,548</p></li>
          </ul>
          <i class="icon4 icon6 icon7"> </i>
          <p class="m_3">Guardians of the Galaxy</p>
        </div>
      </div>
    </div> --}}
    @for ($i = 0; $i < 5; $i++)
    <div class="grid_2 col_1">
      <a href="{{route('single-film',['movie_id' => $data[$i]['movieId']])}}"><img src="{{empty($data[$i]['image']) ? asset('movie/images/pic2.jpg') : $data[$i]['image']}}" class="img-recom-left" alt=""></a>
      <div class="caption1">
        <div class="header-box">
          <ul class="list_3 list_7">
            <li><i class="icon5"> </i><p>3,548</p></li>
          </ul>
          <i class="icon4 icon7"> </i>
        </div>
        <a href="{{route('single-film',['movie_id' => $data[$i]['movieId']])}}"><p class="m_3"><strong>{{empty($data[$i]['title']) ? 'No name' : $data[$i]['title']}}</strong></p></a>
      </div>
    </div>
    @endfor
    
    {{-- <div class="grid_2 col_1">
      <img src="{{asset('movie/images/pic9.jpg')}}" class="img-responsive" alt="">
      <div class="caption1">
        <ul class="list_3 list_7">
          <li><i class="icon5"> </i><p>3,548</p></li>
        </ul>
        <i class="icon4 icon7"> </i>
        <p class="m_3">Guardians of the Galaxy</p>
      </div>
    </div> --}}
  </div> 
  <div class="clearfix"> </div>
</div>
</div>
</div>
</div>
<script type="text/javascript">

  $(function () {
    $("#rateYo").rateYo({
      rating: {{empty($ratingReal) ? 0 : $ratingReal}},
      starWidth: "22px"
    });
  });

  $(function () {
    $("#rateYo").rateYo()
    .on("rateyo.set", function (e, data) {
      var rating = data.rating;
      $('#rating_movie').val(rating);
      var dataRating = $('#formRatingMovie').serialize();
      var url  = '{{ url("") }}' + '/rating';
      $.ajax({
        url : url,
        type: "POST",
        data: dataRating,
        success: function(result){
          alert(result.message);
        }
      });
    });
  });
</script> 
@endsection





