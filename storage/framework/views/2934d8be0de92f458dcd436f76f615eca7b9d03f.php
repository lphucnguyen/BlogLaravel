<?php $__env->startSection('content'); ?>
	<h1>Custom Configuration</h1>
	<p>CKFinder provides many configuration options that can be changed to customize the application.
		For details please check the <a href="https://docs.ckeditor.com/ckfinder/ckfinder3/#!/api/CKFinder.Config">documentation</a>.</p>
	<p>In the example below the following options are set:</p>
	<ul>
		<li><a href="https://docs.ckeditor.com/ckfinder/ckfinder3/#!/api/CKFinder.Config-cfg-id"><code>id</code></a> sets the instance ID to <code>custom-instance-id</code>,</li>
		<li><a href="https://docs.ckeditor.com/ckfinder/ckfinder3/#!/api/CKFinder.Config-cfg-thumbnailDefaultSize"><code>thumbnailDefaultSize</code></a> sets the default thumbnail size to 400px after CKFinder is started,</li>
		<li><a href="https://docs.ckeditor.com/ckfinder/ckfinder3/#!/api/CKFinder.Config-cfg-width"><code>width</code></a> sets the widget width to 100% to use all available space,</li>
		<li><a href="https://docs.ckeditor.com/ckfinder/ckfinder3/#!/api/CKFinder.Config-cfg-height"><code>height</code></a> sets the widget height to 500 pixels.</li>
	</ul>
	<pre class="prettyprint"><code>CKFinder.widget( 'ckfinder-widget', {
	id: 'custom-instance-id',
	thumbnailDefaultSize: 400,
	width: '100%',
	height: 500
} );</code></pre>
	<div id="ckfinder-widget"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		CKFinder.widget( 'ckfinder-widget', {
			id: 'custom-instance-id',
			thumbnailDefaultSize: 400,
			width: '100%',
			height: 500
		} );
	</script>
	<script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ckfinder::samples/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog-laravel\vendor\ckfinder\ckfinder-laravel-package\views\samples\other-custom-configuration.blade.php ENDPATH**/ ?>