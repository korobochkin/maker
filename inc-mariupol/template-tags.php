<?php
function maker_mariupol_post_thumbnail() {

	echo '<div class="entry-thumbnail">';

	$url = esc_url( apply_filters( 'the_permalink', get_permalink() ) );

	printf( '<a class="entry-thumbnail-link" href="%s">', $url );

	?><div class="embed-responsive embed-responsive-1by1-9"><div class="embed-responsive-item"><?php
		if( has_post_thumbnail() ) {
			if( is_singular() ) {
				the_post_thumbnail( '1200х630' );
			} else {
				the_post_thumbnail( '670x352' );
			}
		} else {
			?><div class="entry-thumbnail-default">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/anchor.svg' ); ?>">
			</div><?php
		}
	?></div></div></a><?php

	echo '</div>';
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
