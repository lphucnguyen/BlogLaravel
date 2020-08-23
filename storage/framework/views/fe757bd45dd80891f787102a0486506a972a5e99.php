

<?php $__env->startSection('title', 'Subscriber'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Subscriber</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Subscriber List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Subscribe Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($subscriber->email); ?></td>
                                            <td><?php echo e($subscriber->created_at); ?></td>
                                            <td>
                                                <?php if($subscriber->follow): ?>
                                                    <a class="btn btn-success" href="#">Follow</a>
                                                <?php else: ?>
                                                    <a class="btn btn-danger" href="#">Unfollow</a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form method="POST" class="d-inline-block" action="<?php echo e(route('subscriber.destroy', $subscriber->id)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit"
                                                        class="btn btn-danger btn-circle btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>                                                
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous">
                                        <a class="page-link" href="<?php echo e($firstPageUrl); ?>">First</a>
                                    </li>
                                    <?php
                                    $lastPage = min($currentPage + 5, $lastPage)
                                    ?>
                                    <?php for($i = $currentPage; $i <= $lastPage; $i++): ?>
                                        <?php if($i == $currentPage): ?>
                                            <li class="paginate_button page-item active">
                                                <a class="page-link" href="#"><?php echo e($i); ?></a>
                                            </li>
                                        <?php else: ?>
                                            <li class="paginate_button page-item">
                                                <a class="page-link" href="<?php echo e($path . '?page=' . $i); ?>"><?php echo e($i); ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <li class="paginate_button page-item next">
                                        <a class="page-link" href="<?php echo e($lastPageUrl); ?>">Last</a>
                                    </li>
                                </ul>                                    
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog-laravel\resources\views/admin/subscriber/index.blade.php ENDPATH**/ ?>