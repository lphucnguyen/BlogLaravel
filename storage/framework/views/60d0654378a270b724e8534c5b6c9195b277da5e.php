<div class="scroll-to-top">
    <i class="fa fa-arrow-up"></i>
</div>
<header>
    <nav>
        <div class="container">
            <a href="<?php echo e(route("welcome")); ?>" class="logo">Dev.</a>
            <ul class="menu">
                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e($menu->link); ?>"><?php echo e($menu->title); ?></a></li> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="toggleMenu"></div> 
        </div>   
    </nav>
</header><?php /**PATH C:\xampp\htdocs\blog-laravel\resources\views\layouts\frontend\partial\header.blade.php ENDPATH**/ ?>