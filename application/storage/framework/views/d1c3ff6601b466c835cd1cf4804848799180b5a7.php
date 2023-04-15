<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <?php $__currentLoopData = Auth::user()->role->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if(count($menu->submenu) > 0): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#<?php echo e($menu->route); ?>" aria-expanded="false" aria-controls="ui-basic">
                    <i class="<?php echo $menu->icon; ?> mr-2"></i>
                    <span class="menu-title"><?php echo e($menu->menu); ?></span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="<?php echo e($menu->route); ?>">
                    <ul class="nav flex-column sub-menu">
                        <?php $__currentLoopData = $menu->submenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <li class="nav-item"> <a class="nav-link" href="<?php echo e($submenu->route); ?>"><?php echo e($submenu->submenu); ?></a></li>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e($menu->route); ?>">
                    <i class="<?php echo $menu->icon; ?> mr-2"></i>
                    <span class="menu-title"><?php echo e($menu->menu); ?></span>
                </a>
            </li>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </ul>
</nav><?php /**PATH D:\SERVER FUTREZ\htdocs\dprd\application\resources\views/template/admin/sidebar.blade.php ENDPATH**/ ?>