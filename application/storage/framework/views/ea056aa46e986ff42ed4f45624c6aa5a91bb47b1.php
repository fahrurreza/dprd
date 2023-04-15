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
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/bootstrap.min.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/font-awesome.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('user/css/templatemo-softy-pinko.css')); ?>">

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
                            <img src="<?php echo e(asset('user/images/logo-dprd.png')); ?>" alt="Softy Pinko" style="margin-top: 10px;"/>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <?php if(auth()->guard()->check()): ?>
                            <li><a><?php echo e(Auth::user()->username); ?></a></li>
                            <li>
                                <button class='main-button' onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </li>
                            <?php endif; ?>
                            <?php if(auth()->guard()->guest()): ?>
                            <li><button class='main-button' onclick='redirec()'>Login</button></li>
                            <?php endif; ?>
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
    <div class="welcome-area" id="welcome" style="background-image: url(<?php echo e(asset('user/images/banner-dprd.png')); ?>);">

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
                        <img class="card-img-top" src="<?php echo e(asset('adm/images/upload/'.$data['post']->image->files)); ?>" alt="Gambar Ilustrasi">
                        <span class="mx-3">Posted Date : <?php echo e($data['post']->created_at); ?></span>
                        <span class="mx-3">Created By : <?php echo e($data['post']->user->name); ?></span>
                        <div class="card-title mx-4 mt-5">
                            <h3><?php echo e($data['post']->title); ?></h3>
                        </div>
                        <div class="card-body text-justify">
                            <?php echo $data['post']->content; ?>


                            <a href="<?php echo e(route('home')); ?>" class="btn btn-success"> << Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center mb-5">
                    <h3>Berita Lainnya</h3>
                    <?php $__currentLoopData = $data['warta']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo e(asset('adm/images/upload/'.$post->image->files)); ?>" alt="Gambar Ilustrasi">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($post->title); ?></h5>
                            <a href="<?php echo e(url('warta/'.$post->slug)); ?>" class="main-button pt-2">Read More</a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <script src="<?php echo e(asset('user/js/jquery-2.1.0.min.js')); ?>"></script>

    <!-- Bootstrap -->
    <script src="<?php echo e(asset('user/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('user/js/bootstrap.min.js')); ?>"></script>

    <!-- Plugins -->
    <script src="<?php echo e(asset('user/js/scrollreveal.min.js')); ?>"></script>
    <script src="<?php echo e(asset('user/js/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('user/js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('user/js/imgfix.min.js')); ?>"></script> 
    
    <!-- Global Init -->
    <script src="<?php echo e(asset('user/js/custom.js')); ?>"></script>

    <script>
        function redirec()
        {
            window.location.href = "http://localhost:8080/dprd/admin";
        }
    </script>
  </body>
</html><?php /**PATH C:\xampp\htdocs\dprd\application\resources\views/dashboard/wartadetail.blade.php ENDPATH**/ ?>