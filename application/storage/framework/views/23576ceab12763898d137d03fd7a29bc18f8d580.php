

<?php $__env->startSection('content'); ?>
<div class="my-5 mx-5">
    <button class="btn btn-warning noprint" onClick="window.print();">Cetak Raport</button>
    <table class="table table-bordered cetak mt-5">
        <thead>
            <tr>
                <th>Nama Siswa : <?php echo e($data['nama']->nama); ?></th>
                <th>Nama Sekolah : SMKS AL-WASLIYAH HAMPARAN PERAK</th>
                <th>Kelas : <?php echo e($data['kelas']->group); ?></th>
                <th></th>
            </tr>
            <tr>
                <th>Nisn : <?php echo e($data['nama']->nisn); ?></th>
                <th>Alamat : <?php echo e($data['nama']->alamat); ?></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>No</td>
                <td>Mata Pelajaran</td>
                <td>Nilai</td>
                <td>Angka</td>
                <td>Predikat</td>
            </tr>
            <?php $__currentLoopData = $data['siswa']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($score->pelajaran); ?></td>
                <td><?php echo e($score->nilai); ?></td>
                <td><?php echo e($score->angka); ?></td>
                <td><?php echo e($score->predikat); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<style>   
    @media  print
    {
    .noprint {display:none;}
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smk\resources\views/score/raport.blade.php ENDPATH**/ ?>