<div class="col col-post col-xs-12">
	<div class="cards-entry">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="row row-featured-post-prefix row-featured-post-prefix-before">
				<div class="col-md-6 col-lg-4 offset-md-6 offset-lg-8">
					<span class="separator-line"></span>
				</div>
			</div>
			<div class="row row-featured-post">
				<div class="col-md-6 col-lg-8 col-wide-thumb">
					<?php maker_mariupol_post_thumbnail(); ?>
				</div>

				<div class="col-md-6 col-lg-4 col-post-credits">
					<div class="cards-entry-meta">
						<!--<div class="cards-entry-meta-author">
							<a href="#">Author Name</a>
						</div>-->
						<?php maker_mariupol_post_category(); ?>
						<!--<div class="cards-entry-meta-comments">
							12 Comments
						</div>-->
					</div>

					<header class="cards-entry-header">

						<?php the_title( sprintf( '<h2 class="cards-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					</header><!-- .entry-header -->

					<?php if( has_excerpt() ) : ?>
						<div class="cards-entry-excerpt">
							<?php the_excerpt(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="row row-featured-post-prefix row-featured-post-prefix-after">
				<div class="col-md-6 col-lg-4 offset-md-6 offset-lg-8">
					<span class="separator-line"></span>
				</div>
			</div>
		</article>
	</div>
</div>