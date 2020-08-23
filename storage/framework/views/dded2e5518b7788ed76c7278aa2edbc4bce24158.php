<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('public/assets/admin/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('public/assets/admin/css/sb-admin-2.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin/css/bootstrap-select.css')); ?>">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php echo $__env->make('layouts.admin.partial.sider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php echo $__env->make('layouts.admin.partial.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php if($errors->any()): ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>                            
                            </div>
                        </div>                        
                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>

            </div>
            <!-- End of Main Content -->

            <?php echo $__env->make('layouts.admin.partial.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('public/assets/admin/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('public/assets/admin/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('public/assets/admin/js/sb-admin-2.min.js')); ?>"></script>

    
    <script src="<?php echo e(asset('public/assets/admin/js/bootstrap-select.js')); ?>"></script>
    <script src="<?php echo e(asset('public/ckeditor/ckeditor.js')); ?>"></script>
    <script>
        CKEDITOR.replace( 'contentPost', {
            filebrowserBrowseUrl: '<?php echo e(route('ckfinder_browser')); ?>',
            filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
            filebrowserUploadMethod: 'form'
        } );

    </script>
    <?php echo $__env->make('ckfinder.setup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\blog-laravel\resources\views\layouts\admin\app.blade.php ENDPATH**/ ?>