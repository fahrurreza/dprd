<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">RS SUNDARI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item<?php echo e(request()->is('/') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Receptionist
    </div>

    <!-- Rawat Jalan -->
    <li class="nav-item<?php echo e(request()->is('rwj') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/rwj')); ?>">
            <i class="fas fa-fw fa-hospital-user"></i>
            <span>Rawat Jalan</span></a>
    </li>

    <!-- Rawat Jalan -->
    <!-- <li class="nav-item<?php echo e(request()->is('rwi') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/rwi')); ?>">
            <i class="fas fa-fw fa-procedures"></i>
            <span>Rawal Inap</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access')): ?>
    <!-- Heading -->
    <div class="sidebar-heading">
        Administrator
    </div>

    <!-- User -->
    <li class="nav-item<?php echo e(request()->is('user') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/user')); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>

    <!-- Room -->
    <!-- <li class="nav-item<?php echo e(request()->is('room') ? ' active' : ''); ?>">
        <a class="nav-link" href=" <?php echo e(url('/room')); ?>">
            <i class="fas fa-fw fa-hospital"></i>
            <span>Rooms</span></a>
    </li> -->

    <!-- Bed -->
    <!-- <li class="nav-item <?php echo e(request()->is('bed') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/bed')); ?>">
            <i class="fas fa-fw fa-bed"></i>
            <span>Beds</span></a>
    </li> -->

    <!-- Contract -->
    <li class="nav-item <?php echo e(request()->is('contract') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/contract')); ?>">
            <i class="fas fa-fw fa-building"></i>
            <span>Contracts</span></a>
    </li>

    <!-- Class -->
    <!-- <li class="nav-item <?php echo e(request()->is('category') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/category')); ?>">
            <i class="fas fa-fw fa-user-md"></i>
            <span>Class</span></a>
    </li> -->

    <!-- Docter -->
    <li class="nav-item <?php echo e(request()->is('docter') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/docter')); ?>">
            <i class="fas fa-fw fa-user-md"></i>
            <span>Docters</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <?php endif; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>
<!-- End of Sidebar --><?php /**PATH C:\xampp\htdocs\hospital\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>