<?php
function maker_mariupol_post_thumbnail() {

	$markup = '';

	if( has_post_thumbnail() ) {
		if( is_singular() ) {
			$markup .= get_the_post_thumbnail( null, '1200х630' );
		} else {
			$markup .= get_the_post_thumbnail( null, '670x352' );
		}
	} else {
		$markup .= sprintf(
			'<div class="entry-thumbnail-default"><img src="%1$s"></div>',
			esc_url( get_template_directory_uri() . '/assets/images/anchor.svg' )
		);
	}

	$markup =
		'<div class="embed-responsive embed-responsive-1by1-9"><div class="embed-responsive-item">'
		. $markup .
		'</div></div>';

	if( !is_singular() ) {
		$url = esc_url( apply_filters( 'the_permalink', get_permalink() ) );
		$markup = sprintf( '<a class="entry-thumbnail-link" href="%1$s">%2$s</a>', $url, $markup );
	}

	$markup = '<div class="entry-thumbnail">' . $markup . '</div>';

	echo $markup;
}

function maker_mariupol_post_category() {
	$categories = get_the_category();
	$category = array_shift( $categories );
	if( $category ) {
		/**
		 * @var $category \WP_Term
		 */
		$url = get_category_link( $category->term_id );
		$url = esc_url( $url );

		$name = get_cat_name( $category->term_id );
		$name = esc_html( $name );

		?><div class="cards-entry-meta-category"><?php
			printf( '<a href="%1$s">%2$s</a>', $url, $name );
		?></div><?php
	}
}
