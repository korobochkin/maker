<?php
/**
 * The template used for displaying post content in single.php
 *
 * @package Maker
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php maker_mariupol_post_thumbnail(); ?>

	<div class="row">

		<div class="col-md-2">
			<?php maker_entry_meta_before_content(); ?>
		</div>

		<div class="col-md-8">

			<header class="entry-header">

				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content post-single-item-content">

				<?php maker_mariupol_the_content_intro(); ?>

				<?php the_content(); ?>

				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'maker' ), 'after' => '</div>' ) ); ?>

			</div><!-- .entry-content -->

			<?php maker_entry_meta_after_content(); ?>
		</div>

	</div>

</article><!-- #post-## -->
