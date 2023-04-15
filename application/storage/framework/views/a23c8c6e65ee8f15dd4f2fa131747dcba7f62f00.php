

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card mx-2">
        <img class="card-img-top" src="<?php echo e(asset('adm/images/upload/'.$post->image->files)); ?>" alt="Gambar Ilustrasi">
        <span class="mx-3">Posted Date : <?php echo e($post->created_at); ?></span>
        <span class="mx-3">Created By : <?php echo e($post->user->name); ?></span>
            <div class="card-title mx-4 mt-5">
                <h3><?php echo e($post->title); ?></h3>
            </div>
            <div class="card-body text-justify">
                <?php echo $post->content; ?>

            </div>
            <div class="button-back">
                <a href="../admin-warta" class="btn btn-success">Kembali</a>
            </div>
        </div>
    </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER\htdocs\dprd\application\resources\views/admin/v_showpublish.blade.php ENDPATH**/ ?>