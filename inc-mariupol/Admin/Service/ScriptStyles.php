<?php
namespace Korobochkin\MakerMariupol\Admin\Service;

class ScriptStyles {

	public static function register() {
		wp_enqueue_style(
			'maker-mariupol-admin-styles',
			get_template_directory_uri() . '/admin-style.css',
			array(),
			MAKER_VERSION
		);
	}
}
