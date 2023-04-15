

<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card p-3">
                <?php echo $tes; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER\htdocs\smk\application\resources\views/admin/v_tes.blade.php ENDPATH**/ ?>