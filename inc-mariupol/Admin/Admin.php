<?php
namespace Korobochkin\MakerMariupol\Admin;

class Admin {

	public static function run() {

		add_action( 'admin_enqueue_scripts', array( 'Korobochkin\MakerMariupol\Admin\Service\ScriptStyles', 'register' ) );

		// MetaBoxes
		add_action( 'init', array( 'Korobochkin\MakerMariupol\Meta\Loader', 'run' ) );
		add_action( 'init', array( 'Korobochkin\MakerMariupol\MetaBoxes\Loader', 'init' ) );
		add_action( 'add_meta_boxes', array( 'Korobochkin\MakerMariupol\MetaBoxes\Loader', 'add' ) );

		// New MetaBoxes context
		add_action( 'edit_form_after_title', array( 'Korobochkin\MakerMariupol\Admin\EditForm\EditForm', 'after_title' ) );
	}
}
