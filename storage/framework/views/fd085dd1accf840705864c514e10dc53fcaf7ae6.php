<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('APP_NAME', 'Blog')); ?></title>
    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/frontend/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/frontend/css/articleContent.css')); ?>">
</head>
<body style="background: #ffffff url(<?php echo e(asset('public/assets/frontend/image/back-pattern.png')); ?>) repeat fixed top center;">
    <?php echo $__env->make('layouts.frontend.partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('layouts.frontend.partial.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('public/assets/frontend/js/jquery-3.5.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/frontend/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/frontend/js/main.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(config('sweetalert.animatecss')); ?>">
    <script src="<?php echo e($cdn ?? asset('public/vendor/sweetalert/sweetalert.all.js')); ?>"></script>
    <?php echo $__env->make('sweetalert.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\blog-laravel\resources\views\layouts\frontend\app.blade.php ENDPATH**/ ?>