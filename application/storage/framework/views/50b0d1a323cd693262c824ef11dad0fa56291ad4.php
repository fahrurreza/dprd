<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion noprint" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item<?php echo e(request()->is('/') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/')); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <?php if(Auth::user()->position == 'Administrator'): ?>
    <li class="nav-item<?php echo e(request()->is('teacher', 'student', 'kelas', 'pelajaran', 'calender', 'tahun', 'kurikulum') ? ' active' : ''); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-database"></i>
            <span>Menu Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item<?php echo e(request()->is('teacher') ? ' active' : ''); ?>" href="<?php echo e(url('teacher')); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Guru</span>
                </a>
                <a class="collapse-item<?php echo e(request()->is('student') ? ' active' : ''); ?>" href="<?php echo e(url('student')); ?>">
                    <i class="far fa-fw fa-user"></i>
                    <span>Murid</span></a>
                </a>
                <a class="collapse-item<?php echo e(request()->is('kelas') ? ' active' : ''); ?>" href="<?php echo e(url('kelas')); ?>">
                    <i class="fas fa-fw fa-balance-scale"></i>
                    <span>Kelas</span></a>
                </a>
                <a class="collapse-item<?php echo e(request()->is('pelajaran') ? ' active' : ''); ?>" href="<?php echo e(url('pelajaran')); ?>">
                    <i class="fas fa-fw fa-list-ul"></i>
                    <span>Mata Pelajaran</span></a>
                </a>
                <a class="collapse-item<?php echo e(request()->is('calender') ? ' active' : ''); ?>" href="<?php echo e(url('calender')); ?>">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Kalender Akademik</span></a>
                </a>
                <a class="collapse-item<?php echo e(request()->is('kurikulum') ? ' active' : ''); ?>" href="<?php echo e(url('kurikulum')); ?>">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Kurikulum</span></a>
                </a>
                <a class="collapse-item<?php echo e(request()->is('tahun') ? ' active' : ''); ?>" href="<?php echo e(url('tahun')); ?>">
                    <i class="fas fa-fw fa-exchange-alt"></i>
                    <span>Tahun Ajaran</span></a>
                </a>
            </div>
        </div>
    </li>

    <li class="nav-item<?php echo e(request()->is('jadwal', 'cari') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/jadwal')); ?>">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Jadwal Pelajaran</span></a>
    </li>
    
    <li class="nav-item<?php echo e(request()->is('user') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/user')); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Pengguna</span></a>
    </li>
    
    <li class="nav-item<?php echo e(request()->is('lap_teacher', 'lap_student') ? ' active' : ''); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-copy"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item<?php echo e(request()->is('lap_teacher') ? ' active' : ''); ?>" href="<?php echo e(url('/lap_teacher')); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Guru</span>
                </a>
                <a class="collapse-item<?php echo e(request()->is('lap_student') ? ' active' : ''); ?>" href="<?php echo e(url('/lap_student')); ?>">
                    <i class="far fa-fw fa-user"></i>
                    <span>Murid</span></a>
                </a>
            </div>
        </div>
    </li>
    <?php elseif(Auth::user()->position == 'Kepsek'): ?>
    <li class="nav-item<?php echo e(request()->is('calender') ? ' active' : ''); ?>">
        <a class="nav-link"  href="<?php echo e(url('calender')); ?>">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Kalender Akademik</span></a>
    </li>
    <li class="nav-item<?php echo e(request()->is('jadwal', 'cari') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/jadwal')); ?>">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Jadwal Mengajar</span></a>
    </li>
    <li class="nav-item<?php echo e(request()->is('lap_teacher', 'lap_student') ? ' active' : ''); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-copy"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item<?php echo e(request()->is('lap_teacher') ? ' active' : ''); ?>" href="<?php echo e(url('/lap_teacher')); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Guru</span>
                </a>
                <a class="collapse-item<?php echo e(request()->is('lap_student') ? ' active' : ''); ?>" href="<?php echo e(url('/lap_student')); ?>">
                    <i class="far fa-fw fa-user"></i>
                    <span>Murid</span></a>
                </a>
            </div>
        </div>
    </li>
    <?php elseif(Auth::user()->position == 'Guru'): ?>
    <li class="nav-item<?php echo e(request()->is('jadwal', 'cari') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/jadwal')); ?>">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Jadwal Mengajar</span></a>
    </li>
    <li class="nav-item<?php echo e(request()->is('absen', 'data') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/absen')); ?>">
            <i class="fas fa-fw fa-clock"></i>
            <span>Absensi Siswa</span></a>
    </li>
    <li class="nav-item<?php echo e(request()->is('score', 'data_score') ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(url('/score')); ?>">
            <i class="fas fa-fw fa-copy"></i>
            <span>Nilai Siswa</span></a>
    </li>
    <?php endif; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>
<!-- End of Sidebar --><?php /**PATH C:\xampp\htdocs\smk\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>