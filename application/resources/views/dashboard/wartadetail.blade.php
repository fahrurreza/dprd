<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

    <title>DPRD KOTA BINJAI</title>
<!--
SOFTY PINKO
https://templatemo.com/tm-535-softy-pinko
-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('user/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{asset('user/css/templatemo-softy-pinko.css')}}">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo-dprd" style="margin-left: 30px;">
                            <img src="{{asset('user/images/logo-dprd.png')}}" alt="Softy Pinko" style="margin-top: 10px;"/>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            @auth
                            <li><a>{{Auth::user()->username}}</a></li>
                            <li>
                                <button class='main-button' onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @endauth
                            @guest
                            <li><button class='main-button' onclick='redirec()'>Login</button></li>
                            @endguest
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome" style="background-image: url({{asset('user/images/banner-dprd.png')}});">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Small Start ***** -->
    
    <!-- ***** Features Small End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section padding-top-70 padding-bottom-0" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center mb-5">
                    <div class="card mx-2">
                        <img class="card-img-top" src="{{asset('adm/images/upload/'.$data['post']->image->files)}}" alt="Gambar Ilustrasi">
                        <span class="mx-3">Posted Date : {{$data['post']->created_at}}</span>
                        <span class="mx-3">Created By : {{$data['post']->user->name}}</span>
                        <div class="card-title mx-4 mt-5">
                            <h3>{{$data['post']->title}}</h3>
                        </div>
                        <div class="card-body text-justify">
                            {!! $data['post']->content !!}

                            <a href="{{route('home')}}" class="btn btn-success"> << Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center mb-5">
                    <h3>Berita Lainnya</h3>
                    @foreach($data['warta'] as $post)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('adm/images/upload/'.$post->image->files)}}" alt="Gambar Ilustrasi">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <a href="{{url('warta/'.$post->slug)}}" class="main-button pt-2">Read More</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright">Copyright &copy; 2020 Softy Pinko Company - Design: TemplateMo</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- jQuery -->
    <script src="{{asset('user/js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('user/js/popper.js')}}"></script>
    <script src="{{asset('user/js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('user/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('user/js/waypoints.min.js')}}"></script>
    <script src="{{asset('user/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('user/js/imgfix.min.js')}}"></script> 
    
    <!-- Global Init -->
    <script src="{{asset('user/js/custom.js')}}"></script>

    <script>
        function redirec()
        {
            window.location.href = "http://localhost:8080/dprd/admin";
        }
    </script>
  </body>
</html>