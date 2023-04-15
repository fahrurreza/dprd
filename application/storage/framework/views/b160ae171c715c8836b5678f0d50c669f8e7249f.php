

<?php $__env->startSection('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <?php echo $__env->make('jadwal.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

    </div>
    <?php elseif(session('status_error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>

    
    <?php if(Auth::user()->position == 'Administrator'): ?>
    <div class="row mt-2">
        <div class="col-4 my-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Senin</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu</th>
                                    <th>Matpel</th>
                                    <th>Guru</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['senin']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><center><?php echo e($senin->mulai); ?> - <?php echo e($senin->akhir); ?></center></td>
                                    <td><center><?php echo e($senin->pelajaran); ?></center></td>
                                    <td><center><?php echo e($senin->nama); ?></center></td>
                                    <td>
                                        <center>
                                            <form action="<?php echo e(url('jadwal/'.$senin->id)); ?>" method="post" class="d-inline">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" title="delete">Hapus</button>
                                            </form>
                                        </center>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 my-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Selasa</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu</th>
                                    <th>Matpel</th>
                                    <th>Guru</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['selasa']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selasa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><center><?php echo e($selasa->mulai); ?> - <?php echo e($selasa->akhir); ?></center></td>
                                    <td><center><?php echo e($selasa->pelajaran); ?></center></td>
                                    <td><center><?php echo e($selasa->nama); ?></center></td>
                                    <td>
                                        <center>
                                            <form action="<?php echo e(url('jadwal/'.$selasa->id)); ?>" method="post" class="d-inline">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" title="delete">Hapus</button>
                                            </form>
                                        </center>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 my-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Rabu</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu</th>
                                    <th>Matpel</th>
                                    <th>Guru</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['rabu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rabu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><center><?php echo e($rabu->mulai); ?> - <?php echo e($rabu->akhir); ?></center></td>
                                    <td><center><?php echo e($rabu->pelajaran); ?></center></td>
                                    <td><center><?php echo e($rabu->nama); ?></center></td>
                                    <td>
                                        <center>
                                            <form action="<?php echo e(url('jadwal/'.$rabu->id)); ?>" method="post" class="d-inline">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" title="delete">Hapus</button>
                                            </form>
                                        </center>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 my-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Kamis</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu</th>
                                    <th>Matpel</th>
                                    <th>Guru</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['kamis']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><center><?php echo e($kamis->mulai); ?> - <?php echo e($kamis->akhir); ?></center></td>
                                    <td><center><?php echo e($kamis->pelajaran); ?></center></td>
                                    <td><center><?php echo e($kamis->nama); ?></center></td>
                                    <td>
                                        <center>
                                            <form action="<?php echo e(url('jadwal/'.$kamis->id)); ?>" method="post" class="d-inline">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" title="delete">Hapus</button>
                                            </form>
                                        </center>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 my-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Jumat</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu</th>
                                    <th>Matpel</th>
                                    <th>Guru</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['jumat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jumat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><center><?php echo e($jumat->mulai); ?> - <?php echo e($jumat->akhir); ?></center></td>
                                    <td><center><?php echo e($jumat->pelajaran); ?></center></td>
                                    <td><center><?php echo e($jumat->nama); ?></center></td>
                                    <td>
                                        <center>
                                            <form action="<?php echo e(url('jadwal/'.$jumat->id)); ?>" method="post" class="d-inline">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" title="delete">Hapus</button>
                                            </form>
                                        </center>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 my-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Sabtu</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu</th>
                                    <th>Matpel</th>
                                    <th>Guru</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['sabtu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sabtu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><center><?php echo e($sabtu->mulai); ?> - <?php echo e($sabtu->akhir); ?></center></td>
                                    <td><center><?php echo e($sabtu->pelajaran); ?></center></td>
                                    <td><center><?php echo e($sabtu->nama); ?></center></td>
                                    <td>
                                        <center>
                                            <form action="<?php echo e(url('jadwal/'.$sabtu->id)); ?>" method="post" class="d-inline">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" title="delete">Hapus</button>
                                            </form>
                                        </center>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php else: ?>
    <div class="my-5">
        <table id="example" class="display table" style="width:100%" border="solid, black, 1px">
            <thead>
                <tr>
                    <td>Hari</td>
                    <?php $__currentLoopData = $data['kelas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><center><?php echo e($kelas->group); ?></center></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Senin</td>
                    <?php $__currentLoopData = $data['kelas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td>
                        <center>
                            <table class="table" border="solid, black, 1px">
                                <thead>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>Mapel</td>
                                        <td>Guru</td>
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $data['senin']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $senin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($kelas->id == $senin->group_id): ?>
                                <tbody>
                                    <td><?php echo e($senin->mulai); ?> - <?php echo e($senin->akhir); ?></td>
                                    <td><?php echo e($senin->pelajaran); ?></td>
                                    <td><?php echo e($senin->nama); ?></td>
                                </tbody>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </center>
                    </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td>Selasa</td>
                    <?php $__currentLoopData = $data['kelas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td>
                        <center>
                            <table class="table" border="solid, black, 1px">
                                <thead>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>Mapel</td>
                                        <td>Guru</td>
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $data['selasa']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selasa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($kelas->id == $selasa->group_id): ?>
                                <tbody>
                                    <td><?php echo e($selasa->mulai); ?> - <?php echo e($selasa->akhir); ?></td>
                                    <td><?php echo e($selasa->pelajaran); ?></td>
                                    <td><?php echo e($selasa->nama); ?></td>
                                </tbody>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </center>
                    </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td>Rabu</td>
                    <?php $__currentLoopData = $data['kelas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td>
                        <center>
                            <table class="table" border="solid, black, 1px">
                                <thead>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>Mapel</td>
                                        <td>Guru</td>
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $data['rabu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rabu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($kelas->id == $rabu->group_id): ?>
                                <tbody>
                                    <td><?php echo e($rabu->mulai); ?> - <?php echo e($rabu->akhir); ?></td>
                                    <td><?php echo e($rabu->pelajaran); ?></td>
                                    <td><?php echo e($rabu->nama); ?></td>
                                </tbody>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </center>
                    </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td>Kamis</td>
                    <?php $__currentLoopData = $data['kelas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td>
                        <center>
                            <table class="table" border="solid, black, 1px">
                                <thead>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>Mapel</td>
                                        <td>Guru</td>
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $data['kamis']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($kelas->id == $kamis->group_id): ?>
                                <tbody>
                                    <td><?php echo e($kamis->mulai); ?> - <?php echo e($kamis->akhir); ?></td>
                                    <td><?php echo e($kamis->pelajaran); ?></td>
                                    <td><?php echo e($kamis->nama); ?></td>
                                </tbody>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </center>
                    </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td>Jumat</td>
                    <?php $__currentLoopData = $data['kelas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td>
                        <center>
                            <table class="table" border="solid, black, 1px">
                                <thead>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>Mapel</td>
                                        <td>Guru</td>
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $data['jumat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jumat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($kelas->id == $jumat->group_id): ?>
                                <tbody>
                                    <td><?php echo e($jumat->mulai); ?> - <?php echo e($jumat->akhir); ?></td>
                                    <td><?php echo e($jumat->pelajaran); ?></td>
                                    <td><?php echo e($jumat->nama); ?></td>
                                </tbody>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </center>
                    </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td>Sabtu</td>
                    <?php $__currentLoopData = $data['kelas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td>
                        <center>
                            <table class="table" border="solid, black, 1px">
                                <thead>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>Mapel</td>
                                        <td>Guru</td>
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $data['sabtu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sabtu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($kelas->id == $sabtu->group_id): ?>
                                <tbody>
                                    <td><?php echo e($sabtu->mulai); ?> - <?php echo e($sabtu->akhir); ?></td>
                                    <td><?php echo e($sabtu->pelajaran); ?></td>
                                    <td><?php echo e($sabtu->nama); ?></td>
                                </tbody>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </center>
                    </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <tbody>
        </table>
    </div>
    <?php endif; ?>
</div>
<!-- /.container-fluid -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smk\resources\views/jadwal/jadwal.blade.php ENDPATH**/ ?>