<?php $__env->startSection('content'); ?>
	<h1>Plugin Examples</h1>
	<p>The example below shows the <code>StatusBarInfo</code> plugin that displays basic information about the selected file in the application status bar.
		You can find more plugin examples in the  <a href="https://github.com/ckfinder/ckfinder-docs-samples">CKFinder sample plugins repository</a>.
		Please have a look at <a href="https://docs.ckeditor.com/ckfinder/ckfinder3/#!/guide/dev_plugins">plugin documentation</a>, too.</p>
	<pre class="prettyprint"><code>CKFinder.widget( 'ckfinder-widget', {
	width: '100%',
	height: 500,
	plugins: [
		// The path must be relative to the location of the ckfinder.js file.
		'../samples/plugins/StatusBarInfo/StatusBarInfo'
	]
} );</code></pre>
	<div id="ckfinder-widget"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		CKFinder.widget( 'ckfinder-widget', {
			width: '100%',
			height: 500,
			plugins: [
				// Path must be relative to the location of ckfinder.js file
				'samples/plugins/StatusBarInfo/StatusBarInfo'
			]
		} );
	</script>
	<script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ckfinder::samples/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog-laravel\vendor\ckfinder\ckfinder-laravel-package\views\samples\plugin-examples.blade.php ENDPATH**/ ?>