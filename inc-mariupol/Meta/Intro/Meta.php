<?php
namespace Korobochkin\MakerMariupol\Meta\Intro;

use Korobochkin\MakerMariupol\Meta\Prototypes\MetaAbstract;

class Meta extends MetaAbstract {

	public function __construct() {
		$this->setName('intro');
		$this->setVisible(false);
		$this->setDefaultValue('');
		$this->setAllowedPostTyes(array('post'));
	}

	public function sanitize( $value ) {
		$value = wp_kses( $value, wp_kses_allowed_html() );
		return $value;
	}
}
