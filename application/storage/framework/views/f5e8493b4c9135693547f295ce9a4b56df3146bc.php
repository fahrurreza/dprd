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
                            <li><a href="#welcome" class="active">Beranda</a></li>
                            <li><a href="#features">Profile</a></li>
                            <li><a href="#work-process">Pimpinan</a></li>
                            <li><a href="#testimonials">Fraksi</a></li>
                            <li><a href="#pricing-plans">Komisi</a></li>
                            <li><a href="#blog">Publikasi</a></li>
                            <li><a href="#contact-us">Aspirasi</a></li>
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
                <div class="col-lg-12 text-center mb-5"><h1>Profile</h1></div>
                <div class="col-lg-6 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="left-heading">
                        <h2 class="section-title">Visi</h2>
                    </div>
                    <div class="left-text">
                        <?php $__currentLoopData = $data['visi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($loop->iteration); ?>. <?php echo e($visi->deskripsi); ?> <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">
                        <h2 class="section-title">Misi</h2>
                    </div>
                    <div class="left-text">
                        <?php $__currentLoopData = $data['misi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $misi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($loop->iteration); ?>. <?php echo e($misi->deskripsi); ?> <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <!-- <div class="row my-5">
                <div class="col-lg-12 text-center"><h3>Tugas dan Wewenang</h3></div>
                <?php $__currentLoopData = $data['organisasi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organisasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6 mt-3">
                    <div class="card" style="border:0">
                        <div class="card-title"><h4><?php echo e($loop->iteration); ?> - <?php echo e($organisasi->unit); ?></h4></div>
                        <div class="card-body">
                            <h5 class="my-2">Tugas Pokok :</h5>
                            <?php $__currentLoopData = $organisasi->tugaspokok; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pokok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $pokok->tugas; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <h5 class="my-2">Tugas Fungsi :</h5>
                            <?php $__currentLoopData = $organisasi->tugasfungsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fungsi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $fungsi->fungsi; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div> -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Home Parallax Start ***** -->
    <section class="mini" id="work-process">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="info">
                            <h1>Struktur Organisasi</h1>
                            <p>Struktur Oraganisasi DPRD Kota Binjai</p>
                        </div>
                    </div>
                </div>

                <!-- ***** Mini Box Start ***** -->
                <div class="row">
                    <?php $__currentLoopData = $data['struktur']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $struktur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="<?php echo e(asset('user/images/avatar.png')); ?>" alt="img-struktur" style="width:150px;"></i>
                            <strong><?php echo e($struktur->anggota->nama); ?></strong>
                            <span><?php echo e($struktur->jabatan); ?></span>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- ***** Mini Box End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Home Parallax End ***** -->

    <!-- ***** Testimonials Start ***** -->
    <section class="section" id="testimonials">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Fraksi</h2>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Testimonials Item Start ***** -->
                <?php $__currentLoopData = $data['fraksi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fraksi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <p><td><?php echo e($fraksi->partai); ?></td></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- ***** Testimonials Item End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Testimonials End ***** -->

    <!-- ***** Pricing Plans Start ***** -->
    <section class="section colored" id="pricing-plans">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Komisi</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Komisi yang terdapat pada susunan struktur organisasi DPRD Kota Binjai</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Pricing Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Komisi A</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="price">10</span>
                                <span class="period">orang</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->

                <!-- ***** Pricing Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                    <div class="pricing-item active">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Komisi B</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="price">10</span>
                                <span class="period">orang</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->

                <!-- ***** Pricing Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Komisi C</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="price">10</span>
                                <span class="period">orang</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Pricing Plans End ***** -->

    <!-- ***** Blog Start ***** -->
    <section class="section" id="blog">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Warta</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Menyajikan berita-berita terbaru terkait Kota Binjai.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <?php $__currentLoopData = $data['warta']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="<?php echo e(asset('adm/images/upload/'.$post->image->files)); ?>" alt="<?php echo e($post->slug); ?>">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <a href="#"><?php echo e($post->title); ?></a>
                            </h3>
                            <div class="text">
                                <?php echo substr($post->content, 5, 150); ?>

                            </div>
                            <a href="#" class="main-button">Read More</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->

    <!-- ***** Contact Us Start ***** -->
    <section class="section colored" id="contact-us">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Aspirasi</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Masyarakat dapat menyampaikan aspirasi yang di tujukan kepada DPRD Kota Binjai.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Contact Text Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h5 class="margin-bottom-30">Sampaikan aspirasimu</h5>
                    <div class="contact-text">
                        <p>Sampaikan denga bahasa yang sopan dan bijaksana</p>
                    </div>
                </div>
                <!-- ***** Contact Text End ***** -->

                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <?php if(count($data['aspirasi']) > 0): ?>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            Berikut hasil aspirasi anda :
                        </div>
                        <?php $__currentLoopData = $data['aspirasi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aspirasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($aspirasi->hasil != null): ?>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo e($aspirasi->hasil); ?>" disabled>
                                    <span class="input-group-append">
                                        <a class="file-upload-browse btn btn-success" href="<?php echo e(asset('adm/document/'.$aspirasi->hasil)); ?>" download>Download Hasil</a>
                                    </span>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo e($aspirasi->disposisi); ?>" disabled>
                                    <span class="input-group-append">
                                        <a class="file-upload-browse btn btn-success">Hasil Belum Keluar</a>
                                    </span>
                                </div>
                            </div>

                            <div class="contact-form mt-3">
                                <form id="contact" action="<?php echo e(url('create-aspirasi')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input name="perihal" type="text" class="form-control" id="name" placeholder="Perihal" required="">
                                        </fieldset>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                        <fieldset>
                                            <textarea name="pesan" rows="6" class="form-control" id="message" placeholder="Isi Aspirasi" required=""></textarea>
                                        </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button">Kirim Aspirasi</button>
                                        </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="contact-form">
                            <form id="contact" action="<?php echo e(url('create-aspirasi')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="perihal" type="text" class="form-control" id="name" placeholder="Perihal" required="">
                                    </fieldset>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <textarea name="pesan" rows="6" class="form-control" id="message" placeholder="Isi Aspirasi" required=""></textarea>
                                    </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Kirim Aspirasi</button>
                                    </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->
    
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
</html><?php /**PATH D:\SERVER MEDIFIRST\htdocs\dprd\application\resources\views/dashboard/index.blade.php ENDPATH**/ ?>