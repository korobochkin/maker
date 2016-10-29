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

	// Sticky footer
	function makerMariupolStickyFooter() {

		var $window = $(window),
			windowHeight,

			$wpadminbar = $('#wpadminbar'),
			adminBarHeight,

			$page = $('#page'),
			pageHeight,

			$footer = $('#colophon'),
			footerHeight,
			$footerPush = $('#site-footer-push'),
			diff;

		$(window).resize(function(){
			windowHeight = $window.outerHeight();
			adminBarHeight = $wpadminbar.outerHeight();
			pageHeight = $page.outerHeight();
			footerHeight = $footer.outerHeight();

			diff = windowHeight - adminBarHeight - pageHeight - footerHeight;

			if(diff > 0) {
				$footerPush.height(diff);
			} else {
				$footerPush.height(0);
			}
		});

		$(window).resize();
	}
	makerMariupolStickyFooter();

	function makerMariupolFeaturedPosts() {
		var container = $('#primary-posts-container');

		//var posts = container.find('.col-post');
		/*$.each(posts, function(index, value) {
			var height;
			console.log(index, value, '\n');
			height = $(value).outerHeight();
			//height = value.outerHeight();
			if( maxHeight < height ) {
				maxHeight = height;
			}
		});*/

		container.packery({
			itemSelector: '.col-post'
			//rowHeight: maxHeight
		});
	}
	makerMariupolFeaturedPosts();
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
