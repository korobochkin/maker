<?php
namespace Korobochkin\MakerMariupol\MetaBoxes;

class Loader {

	public static $meta = array(
		'Korobochkin\MakerMariupol\MetaBoxes\Intro\MetaBox'
	);

	public static $instances = array();

	public static function init() {
		if(!empty(self::$meta) && is_array( self::$meta )) {
			foreach (self::$meta as $meta) {
				/**
				 * @var $instance \Korobochkin\MakerMariupol\MetaBoxes\Prototypes\MetaBoxAbstract
				 */
				$instance = new $meta();
				self::$instances[$instance->getId()] = $instance;
				add_action( 'save_post', array( $instance, 'savePost' ), 10, 3 );
			}
		}
	}

	public static function add() {
		if(!empty(self::$instances)) {
			foreach (self::$instances as $meta) {
				/**
				 * @var $meta \Korobochkin\MakerMariupol\MetaBoxes\Prototypes\MetaBoxAbstract
				 */
				$meta->add();
			}
		}
	}
}