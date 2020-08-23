

<?php $__env->startSection('title', 'Category'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Contact</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Contact Info</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="menuTitle">Name: </label>
                                </div>
                                <div class="col-md-10">
                                    <p class="form-control"><?php echo e($contact->name); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="link">Email: </label>
                                </div>
                                <div class="col-md-10">
                                    <p class="form-control"><?php echo e($contact->email); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="link">Message: </label>
                                </div>
                                <div class="col-md-10">
                                    <p class="form-control"><?php echo e($contact->message); ?></p>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-danger" href="<?php echo e(route('contact.index')); ?>">Back</a>                        
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog-laravel\resources\views\admin\contact\edit.blade.php ENDPATH**/ ?>