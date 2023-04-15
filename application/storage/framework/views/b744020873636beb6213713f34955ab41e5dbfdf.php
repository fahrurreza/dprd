<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<h5 class="mt-1">SI SMKS AL-WASLIYAH HAMPARAN PERAK</h3>
<!-- Topbar Search -->
<form class="d-none d-sm-inline-block form-inline ml-auto navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo e(Auth::user()->name); ?></span> -->
            <i class="fas fa-user fa-2x"></i>
            <!-- <img class="img-profile rounded-circle"
                src="img/undraw_profile.svg"> -->
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">
                Profil
            </a>
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">
                Ganti Password
            </a>
        </div>
    </li>

    <li class="nav-item">
            <a class="btn btn-danger mt-3" href="<?php echo e(route('logout')); ?>"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off"></i>
            </a>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
            </form>
    </li>

</ul>

</nav>
<!-- End of Topbar --><?php /**PATH D:\XAMPP\htdocs\smk\resources\views/layouts/topbar.blade.php ENDPATH**/ ?>