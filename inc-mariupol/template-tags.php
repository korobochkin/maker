<?php
function maker_mariupol_post_thumbnail() {
	?><div class="cards-post-thumbnail"><?php

		printf( '<a class="post-thumbnail" href="%s">', esc_url( apply_filters( 'the_permalink', get_permalink() ) ) );

		if( has_post_thumbnail() ) {
			// TODO: fix image size
			the_post_thumbnail( 'maker-thumbnail' );
		} else {
			echo 'default img';
		}

		echo '</a>';
	?></div><?php
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
			printf( '<a href="%2$s">%2$s</a>', $url, $name );
		?></div><?php
	}
}
