<?php if($firstPage != $lastPage): ?>
    <div class="pagination">
        <a href="<?php echo e($prevPage); ?>" class="btn-paginate prev"><i class="fa fa-chevron-left"></i></a>
        <ul class="paginate">
            <?php for($i=$firstPage;$i<=$lastPage;$i++): ?>
                <?php if($i == $currentPage): ?>
                    <li><a class="active" href="<?php echo e($path . '?page=' . $i); ?>"><?php echo e($i); ?></a></li>
                <?php else: ?>
                    <li><a href="<?php echo e($path . '?page=' . $i); ?>"><?php echo e($i); ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>
        </ul>
        <a href="<?php echo e($nextPage); ?>" class="btn-paginate prev"><i class="fa fa-chevron-right"></i></a>
    </div>    
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\blog-laravel\resources\views/layouts/frontend/partial/pagination.blade.php ENDPATH**/ ?>