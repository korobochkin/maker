<?php
/**
 * The main template file.
 *
 * @package Maker
 */

get_header(); ?>

<div id="main" class="site-main" role="main">
	<div id="content" class="site-content">



		<?php if( maker_mariupol_is_sidebar_enabled() ) : ?>
			<div id="primary" class="content-area">
		<?php else : ?>
			<div id="primary" class="content-area-wide">
		<?php endif; ?>



			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/cards/content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php maker_posts_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>



		<?php if( maker_mariupol_is_sidebar_enabled() ) : ?>
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		<?php else : ?>
			</div><!-- #primary -->
		<?php endif; ?>



	</div><!-- #content -->
</div><!-- #main -->

<?php get_footer(); ?>
