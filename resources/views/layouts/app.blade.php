<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Ever Green</title>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('site-content/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site-content/') }}" rel="stylesheet">

    <link href="{{ asset('site-content/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <link href="{{ asset('site-content/css/agency.min.css') }}" rel="stylesheet">

<style>
    #myProgress {
      width: 100%;
      background-color: #ddd;
      text-align: left;
    }
    #myBar {
      width: 0%;
      height: 30px;
      background-color: #4CAF50;
      text-align: center;
      line-height: 30px;
      color: white;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>


<!-- body -->

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <!-- <a class="navbar-brand js-scroll-trigger" href="#page-top">
          <img class="" src="img/logo2.png" width="100" height="100" alt="">
        </a> -->
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse"  id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ route('portfolio') }}">Rooms</a>
            </li>
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>

            @else
              @if (Auth::user()->email=="shamamasafdar@gmail.com")
            <li class="nav-item">
              <a class="btn btn-xl" href="{{ route('upload') }}">+</a>
            </li>
              @endif
            {{--<li class="nav-item">--}}
              {{--<a class="nav-link" href="{{ url('/mymedia') }}">My Rooms</a>--}}
            {{--</li>--}}
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/userProfile') }}">{{ Auth::user()->name }}</a>
            </li>


            <li class="nav-item">
            <a class="nav-link"href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            </li>
            @endguest

          </ul>
        </div>
      </div>
    </nav>

    @yield('content')


    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Evergreen 2017</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="site-content/vendor/jquery/jquery.min.js"></script>
    <script src="site-content/vendor/popper/popper.min.js"></script>
    <script src="site-content/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="site-content/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="site-content/js/jqBootstrapValidation.js"></script>
    <script src="site-content/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="site-content/js/agency.min.js"></script>

  </body>






</html>
