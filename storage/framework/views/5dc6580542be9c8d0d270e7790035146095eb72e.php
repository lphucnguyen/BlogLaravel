<script type="text/javascript" src="<?php echo e(asset('public/js/ckfinder/ckfinder.js')); ?>"></script>
<script>CKFinder.config( { connectorPath: <?php echo json_encode(route('ckfinder_connector'), 15, 512) ?> } );
function BrowseServer( inputId )
{
	CKFinder.modal( {
		chooseFiles: true,
		width: 1000,
		height: 700,
		onInit: function( finder ) {
			finder.on( 'files:choose', function( evt ) {
				var file = evt.data.files.first();
				var output = document.getElementById( inputId );

				output.value = file.getUrl();
			} );
			finder.on( 'file:choose:resizedImage', function( evt ) {
				var output = document.getElementById( inputId );	
				output.value = evt.data.resizedUrl;
			} );
		}
	} );
}
</script>
<?php /**PATH C:\xampp\htdocs\blog-laravel\resources\views/ckfinder/setup.blade.php ENDPATH**/ ?>