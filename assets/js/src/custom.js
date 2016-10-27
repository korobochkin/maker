/*
 * Custom theme scripts.
 */
jQuery( document ).ready( function( $ ) {
	// Fitvids.
	function makerFitvids() {
		$( 'article iframe' ).not( '.fitvid iframe' ).wrap( '<div class=\'fitvid\'/>' );
		$( '.fitvid' ).fitVids();
	}
	makerFitvids();

	// Jetpack Featured content

	function makerMariupolFeatured() {
		var container = $('#primary-posts-container');
		//var posts = container.find('.col-post');

		//console.log(posts);

		/*var maxHeight = 0;

		$.each(posts, function(index, value) {
			var height;
			console.log(index, value, '\n');
			height = $(value).outerHeight();
			//height = value.outerHeight();
			if( maxHeight < height ) {
				maxHeight = height;
			}
		});

		console.log(maxHeight);*/

		container.packery({
			itemSelector: '.col-post',
			//rowHeight: maxHeight
		});
	}
	makerMariupolFeatured();
} );

/**
 * Adds a 'last-page' class to 'nav-links' if necessary.
 */
( function() {
	// Try to get the pagination.
	var nav = document.querySelector( '.nav-links' );

	// Look for 'next' class within 'nav-links'.
	if ( nav && ! nav.querySelector( '.next' ) ) {
		// Add 'last-page' class to 'nav-links' if not found.
		nav.className += ' last-page';
	}
} )();
