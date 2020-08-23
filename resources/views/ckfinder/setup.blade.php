<script type="text/javascript" src="{{ asset('public/js/ckfinder/ckfinder.js') }}"></script>
<script>CKFinder.config( { connectorPath: @json(route('ckfinder_connector')) } );
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
