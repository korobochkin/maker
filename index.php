<?php
/**
 * The main template file.
 *
 * @package Maker
 */

get_header(); ?>

<div id="main" class="site-main" role="main">
	<div id="content" class="site-content">
		<div id="primary" class="content-area">

			<?php if ( have_posts() ) : ?>

				<div class="row">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts-mariupol/cards/content', get_post_format() ); ?>

					<?php endwhile; ?>

				</div>

				<?php maker_posts_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</div><!-- #primary -->
	</div><!-- #content -->
</div><!-- #main -->

<?php get_footer(); ?>
