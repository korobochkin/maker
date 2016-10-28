<?php
/**
 * The template for displaying the footer.
 *
 * @package Maker
 */

?>
</div><!-- #page -->
<div id="site-footer-push"></div>
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site">
		<div class="wrap">
			<div class="row">
				<div class="col-md-2">
					<?php maker_mariupol_site_footer_logo(); ?>
				</div>
				<div class="col-md-5">
					<div class="site-info-legal-notes">
						<?php maker_mariupol_footer_legal_notes(); ?>
					</div><!-- .site-info -->
				</div>
				<div class="col-md-2 offset-md-3">
					<div class="site-info-copyright">
						<?php maker_mariupol_footer_copyright(); ?>
					</div>
				</div>
			</div>
		</div><!-- .column -->
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
