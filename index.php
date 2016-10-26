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

				<div id="primary-posts-container" class="row row-posts-cards">

					<?php
						while ( have_posts() ) {
							the_post();
							if( maker_mariupol_is_featured( get_the_ID() ) ) {
								get_template_part( 'template-parts-mariupol/cards/content-featured', get_post_format() );
							} else {
								get_template_part( 'template-parts-mariupol/cards/content', get_post_format() );
							}
						}
					?>

				</div>

				<?php maker_posts_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</div><!-- #primary -->
	</div><!-- #content -->
</div><!-- #main -->

<?php get_footer(); ?>
