

<?php $__env->startSection('title', 'Slider'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Slider</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <!-- DataTales Example -->
                <form method="POST" action="<?php echo e(route('slider.update', $sliderEdit->id)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Slider</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="sliderTitle">Slider Title: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="sliderTitle" name="title" value="<?php echo e($sliderEdit->title); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="link">Link: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="link" name="link" value="<?php echo e($sliderEdit->link); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="isPublish">Publish: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="published" id="isPublish">
                                            <option value="1" <?php echo e(($sliderEdit->published == 1) ? 'selected' : ''); ?>>Publish</option>
                                            <option value="0" <?php echo e(($sliderEdit->published == 0) ? 'selected' : ''); ?>>Not Publish</option>
                                        </select>                                    
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Feature Image</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="slideImage">Feature Image: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control-file" id="slideImage" name="image" value="<?php echo e($sliderEdit->name); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="<?php echo e($imageUrl); ?>" alt="ImageSlider">
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog-laravel\resources\views\admin\slider\edit.blade.php ENDPATH**/ ?>