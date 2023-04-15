<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome <?php echo e(Auth::user()->name); ?></h3>
            <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> -->
            </div>
            <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
            <div class="flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white" type="button">
                <i class="mdi mdi-calendar"></i> Today (<?php echo e(date('d-M-Y')); ?>)
                </button>
            </div>
            </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\dprd\application\resources\views/template/admin/welcome.blade.php ENDPATH**/ ?>