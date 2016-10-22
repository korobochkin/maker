<?php
/**
 * The default template used for displaying post content in index.php
 *
 * @package Maker
 */

?>
<div class="col-md-4">
	<div class="cards-entry">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php maker_mariupol_post_thumbnail(); ?>

			<div class="cards-entry-meta">
				<div class="cards-entry-meta-author">
					<a href="#">Author Name</a>
				</div>
				<div class="cards-entry-meta-category">
					<a href="#">Category Name</a>
				</div>
				<div class="cards-entry-meta-comments">
					12 Comments
				</div>
			</div>

			<header class="cards-entry-header">

				<?php the_title( sprintf( '<h2 class="cards-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			</header><!-- .entry-header -->

			<div class="cards-entry-excerpt">
				<p>Text text text</p>
			</div>

		</article><!-- #post-## -->
	</div>
</div>
