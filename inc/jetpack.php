<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Maker
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function maker_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'primary',
		'render'         => 'maker_infinite_scroll_render',
		'type'           => 'scroll',
		'wrapper'        => false,
		'footer_widgets' => false,
		'footer'         => false,
	) );

	add_filter( 'infinite_scroll_js_settings', 'maker_load_more_text' );

	add_theme_support( 'featured-content', array(
		'filter' => 'maker_mariupol_get_featured_posts',
	) );

	add_filter( 'post_class', 'maker_mariupol_jetpack_post_class', 10, 3 );
}
add_action( 'after_setup_theme', 'maker_jetpack_setup' );

/**
 * Loads necessary template part during infinite scroll.
 */
function maker_infinite_scroll_render() {
	while ( have_posts() ) : the_post();
		if ( is_search() ) {
			get_template_part( 'template-parts/content-search' );
		} elseif ( 'portfolio' == get_post_type() ) {
			get_template_part( 'template-parts/content-portfolio-toolkit' );
		} elseif ( 'jetpack-portfolio' == get_post_type() ) {
			get_template_part( 'template-parts/content-portfolio-jetpack' );
		} else {
			get_template_part( 'template-parts/content', get_post_format() );
		}
	endwhile;
}

/**
 * Change Older Posts to Load More.
 *
 * @param array $settings array of Infinite Scroll settings.
 */
function maker_load_more_text( $settings ) {
	$settings['text'] = __( 'Load More', 'maker' );

	return $settings;
}

/**
 * Adds excerpts to Jetpack Portfolio.
 */
function maker_jetpack_portfolio_excerpts() {
	if ( post_type_exists( 'jetpack-portfolio' ) ) {
		add_post_type_support( 'jetpack-portfolio', 'excerpt' );
	}
}
add_action( 'init', 'maker_jetpack_portfolio_excerpts' );

function maker_mariupol_get_featured_posts() {
	return apply_filters( 'maker_mariupol_get_featured_posts', array() );
}

function maker_mariupol_has_featured_posts( $minimum = 1 ) {
	if ( is_paged() )
		return false;

	$minimum = absint( $minimum );
	$featured_posts = apply_filters( 'maker_mariupol_get_featured_posts', array() );

	if ( ! is_array( $featured_posts ) )
		return false;

	if ( $minimum > count( $featured_posts ) )
		return false;

	return true;
}

/**
 * Returns true if the given post is featured.
 *
 * @return bool Whether the given post is featured or not.
 */
function maker_mariupol_is_featured( $post_id = null ) {
	// Cached stuff for less overhead :)
	static $current_post_id = 0;
	static $result = false;

	// Maybe we already have result
	if( $current_post_id == $post_id ) {
		return $result;
	}

	$post = get_post( $post_id );
	$featured = $result = false;
	$term_id = maker_mariupol_get_jetpack_featured_content_term_id();
	if ( ! $term_id )
		return $featured;
	$post_tags = wp_get_object_terms( $post->ID, 'post_tag' );
	if ( in_array( $term_id, wp_list_pluck( $post_tags, 'term_id' ) ) )
		$featured = $result = true;
	return $featured;
}

function maker_mariupol_get_jetpack_featured_content_term_id() {
	if ( ! method_exists( 'Featured_Content', 'get_setting' ) )
		return 0;
	$term = get_term_by( 'name', Featured_Content::get_setting( 'tag-name' ), 'post_tag' );
	if ( ! $term )
		return 0;
	return $term->term_id;
}

function maker_mariupol_jetpack_post_class( $classes, $class, $post_id ) {
	if ( maker_mariupol_is_featured( $post_id ) )
		$classes[] = 'maker-mariupol-featured';
	return $classes;
}
