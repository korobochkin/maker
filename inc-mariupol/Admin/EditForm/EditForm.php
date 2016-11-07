<?php
namespace Korobochkin\MakerMariupol\Admin\EditForm;

class EditForm {

	public static function after_title() {
		// get globals vars
		global $post, $wp_meta_boxes;

		// render the meta box in 'maker_mariupol_after_title' context
		do_meta_boxes( get_current_screen(), 'maker_mariupol_after_title', $post );

		// unset 'maker_mariupol_after_title' context from the post's meta boxes
		unset( $wp_meta_boxes['post']['maker_mariupol_after_title'] );
	}
}
