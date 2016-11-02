<?php
namespace Korobochkin\MakerMariupol\Meta;

class Loader {

	public static $metas = array(
		'Korobochkin\MakerMariupol\Meta\Intro\Meta'
	);

	public static $instances = array();

	public static function run() {
		self::setup_metas();
		self::register_metas();
	}

	public static function setup_metas() {

		if( empty( self::$metas ) || !is_array( self::$metas ) )
			return;

		foreach( self::$metas as $meta ) {
			$meta_instance = new $meta();
			/**
			 * @var $meta_instance \Korobochkin\MakerMariupol\Meta\Prototypes\MetaAbstract
			 */
			self::$instances[$meta_instance->getName()] = $meta_instance;
		}
	}

	public static function register_metas() {

		if( empty( self::$instances ) )
			return;

		foreach( self::$instances as $meta ) {
			$meta->register();
		}
	}
}
