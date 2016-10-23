<?php
/**
 * The template for displaying all single posts.
 *
 * @package Maker
 */

get_header(); ?>

<div id="main" class="site-main" role="main">
	<div id="content" class="site-content">
		<div id="primary" class="content-area">

		<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single' );

				?><div class="row"><div class="col-md-8 offset-md-2"><?php

					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

					maker_post_navigation();

				?></div></div><?php

			endwhile;
		?>

		</div>

	</div><!-- #content -->
</div><!-- #main -->

<?php get_footer(); ?>
