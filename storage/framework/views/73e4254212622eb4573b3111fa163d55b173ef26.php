<script type="text/javascript" src="<?php echo e(asset('js/ckfinder/ckfinder.js')); ?>"></script>
<script>CKFinder.config( { connectorPath: <?php echo json_encode(route('ckfinder_connector'), 15, 512) ?> } );</script>
<?php /**PATH C:\xampp\htdocs\blog-laravel\resources\views\vendor\ckfinder\setup.blade.php ENDPATH**/ ?>