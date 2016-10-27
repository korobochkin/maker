<?php
function maker_mariupol_post_thumbnail() {

	$markup = '';

	if( has_post_thumbnail() ) {
		if( is_singular() || maker_mariupol_is_featured( get_the_ID() ) ) {
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

function maker_mariupol_site_footer_logo() {

	$markup = '';

	$markup .= sprintf(
		'<img src="%1$s" height="25">',
		esc_url( get_template_directory_uri() . '/assets/images/anchor-black.svg' )
	);

	$markup = sprintf(
		'<a href="%1$s" class="site-footer-logo">%2$s</a>',
		esc_url( home_url( '/' ) ),
		$markup
	);

	$markup = '<div class="site-footer-logo-wrapper">' . $markup . '</div>';

	echo $markup;
}

function maker_mariupol_footer_copyright() {

	$markup = '';

	$fromYear = 2016;
	$toYear = 0;

	$timezone = get_option( 'timezone_string' );
	if( is_string( $timezone ) && !empty( $timezone ) ) {
		$timezone = new \DateTimeZone( $timezone );
		if( $timezone ) {
			$now = new \DateTime( 'now', $timezone );
			if( $now ) {
				$toYear = $now->format( 'Y' );
			} else {
				$toYear = date( 'Y' );
			}
		}
	} else {
		$toYear = date( 'Y' );
	}
	unset( $timezone, $now );

	if( is_string( $toYear ) ) {
		$toYear = (int)$toYear;
		if( $toYear === $fromYear ) {
			$markup .= sprintf(
				__('&copy;&nbsp;%1$s «%2$s»', 'maker-mariupol'),
				esc_html( $fromYear ),
				esc_html( get_bloginfo( 'name' ) )
			);
		} else {
			$markup .= sprintf(
				__('&copy;&nbsp;%1$s&ndash;%2$s «%3$s»', 'maker-mariupol'),
				esc_html( $fromYear ),
				esc_html( $toYear ),
				esc_html( get_bloginfo( 'name' ) )
			);
		}
	}
	unset( $toYear, $fromYear );

	$email = get_option( 'admin_email' );
	if( !empty( $email ) ) {
		$email = antispambot( $email );
		$markup .= sprintf(
			'<span class="admin-email"><a href="mailto:%1$s">%1$s</a></span>',
			$email
		);
	}
	unset( $email );

	echo $markup;
}

function maker_mariupol_footer_legal_notes() {
	echo 'Використання будь-яких матеріалів сайту заборонене без згоди редакції &laquo;Маріуполісу&raquo;. Всі права на&nbsp;тексти, зображення і&nbsp;відео належать їхнім авторам.';
}

function maker_mariupol_header_site_logo() {

	$markup = '';

	$markup .= sprintf(
		'<img src="%1$s" class="site-header-logo" itemprop="logo" width="219"></a>',
		esc_url( get_template_directory_uri() . '/assets/images/mariupol.svg' )
	);

	$markup = sprintf(
		'<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
		esc_url( home_url( '/' ) ),
		$markup
	);

	echo $markup;
}
