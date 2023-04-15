

<?php $__env->startSection('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

    </div>
    <?php elseif(session('status_error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
    
    <div class="card shadow px-4 py-4">
        
        <div class="row">
            <div class="col-2">
                Kalender Akademik :
            </div>
            <div class="col">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pilih...
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php $__currentLoopData = $data['tahun']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="dropdown-item" data-toggle="collapse" href="#collapseExample<?php echo e($tahun->id); ?>" role="button" aria-expanded="false" aria-controls="collapseExample"><?php echo e($tahun->tahun); ?> - <?php echo e($tahun->keterangan); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="conten mt-5">
            <?php $__currentLoopData = $data['tahun']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="collapse" id="collapseExample<?php echo e($tahun->id); ?>">
                <div>
                    Tahun Ajaran : <?php echo e($tahun->tahun); ?> - <?php echo e($tahun->keterangan); ?>

                </div>
                <div class="card card-body">
                    <ul class="pt-3">
                        <?php $__currentLoopData = $data['calender']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($tahun->id == $calender->tahun_id): ?>
                        <li class="py-2">
                            <?php echo e($calender->kegiatan); ?> : <?php echo e($calender->tanggal); ?>

                            <?php if(Auth::user()->position == 'Administrator'): ?>
                            <form action="<?php echo e(url('calender/'.$calender->id)); ?>" method="post" class="d-inline">
                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-danger btn-sm" title="delete">Hapus</button>
                            </form>
                            <?php endif; ?>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if(Auth::user()->position == 'Administrator'): ?>
        <div class="form">
            <form method="post" action="<?php echo e(url('/calender')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputState">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Tahun Ajaran</label>
                        <select id="inputState" class="form-control" name="tahun_id">
                            <?php $__currentLoopData = $data['tahun']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tahun->id); ?>"><?php echo e($tahun->tahun); ?> - <?php echo e($tahun->keterangan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Kegiatan</label>
                        <input type="text" class="form-control" name="kegiatan">
                    </div>
                    <div class="form-group col-md-2 mt-3">
                        <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <?php endif; ?>   
    </div>

</div>
<!-- /.container-fluid -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smk\resources\views/calender/index.blade.php ENDPATH**/ ?>