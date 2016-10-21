<?php
function maker_mariupol_body_classes( $classes ) {

	if( is_home() || is_archive() ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'maker_mariupol_body_classes' );
