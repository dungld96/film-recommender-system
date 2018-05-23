<!DOCTYPE HTML>
<html>
<head>
  <title>Movie_store A Entertainment Category Flat Bootstarp Resposive Website Template | Home :: w3layouts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Movie_store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <link href="{{asset('movie/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />

  <link href="{{asset('movie/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
  <!-- start plugins -->
  <script type="text/javascript" src="{{asset('movie/js/jquery-1.11.1.min.js')}}"></script>
  <script src="{{asset('movie/js/bootstrap.min.js')}}"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
  <script src="{{asset('movie/js/responsiveslides.min.js')}}"></script>
  <script src="{{asset('movie/js/jquery.flexisel.js')}}"></script>
  <link rel="stylesheet" href="{{asset('rateyo/jquery.rateyo.css')}}"/>
  <script src="{{asset('rateyo/jquery.rateyo.js')}}"></script>

  <script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
</head>
<body>
@yield('content')
<div class="container"> 
 <footer id="footer">
  <div id="footer-3d">
    <div class="gp-container">
      <span class="first-widget-bend"></span>
    </div>      
  </div>
  <div id="footer-widgets" class="gp-footer-larger-first-col">
    <div class="gp-container">
      <div class="footer-widget footer-1">
        <div class="wpb_wrapper">
          <img src="{{asset('movie/images/f_logo.png')}}" alt=""/>
        </div> 
        <br>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page.</p>
        <p class="text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered.</p>
      </div>
      <div class="footer_box">
        <div class="col_1_of_3 span_1_of_3">
          <h3>Categories</h3>
          <ul class="first">
            <li><a href="#">Dance</a></li>
            <li><a href="#">History</a></li>
            <li><a href="#">Specials</a></li>
          </ul>
        </div>
        <div class="col_1_of_3 span_1_of_3">
          <h3>Information</h3>
          <ul class="first">
            <li><a href="#">New products</a></li>
            <li><a href="#">top sellers</a></li>
            <li><a href="#">Specials</a></li>
          </ul>
        </div>
        <div class="col_1_of_3 span_1_of_3">
          <h3>Follow Us</h3>
          <ul class="first">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Youtube</a></li>
          </ul>
          <div class="copy">
            <p>&copy; 2018 Edit by <a href="http://dungle.ml" target="_blank"> Dũng Lê</a></p>
          </div>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</footer>
</div> 
</body>
</html>