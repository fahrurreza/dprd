

<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <?php $__currentLoopData = $data['post']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mt-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo e(asset('adm/images/upload/'.$post->image->files)); ?>" alt="Gambar Ilustrasi">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($post->title); ?></h5>
                            <p class="card-text"><div><?php echo e($post->created_at); ?></div></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
  <!-- content-wrapper ends -->

<script>
function showFormPublish()
{
    $("#buttonShowFormPublish").addClass("d-none");
    $("#formPublish").removeClass("d-none");
}

function cancelFormPublish()
{
    $("#buttonShowFormPublish").removeClass("d-none");
    $("#formPublish").addClass("d-none");
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER MEDIFIRST\htdocs\dprd\application\resources\views/admin/v_galeri.blade.php ENDPATH**/ ?>