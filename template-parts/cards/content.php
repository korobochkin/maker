<?php
/**
 * The default template used for displaying post content in index.php
 *
 * @package Maker
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php maker_mariupol_post_thumbnail(); ?>

	<header class="cards-entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</header><!-- .entry-header -->

</article><!-- #post-## -->
