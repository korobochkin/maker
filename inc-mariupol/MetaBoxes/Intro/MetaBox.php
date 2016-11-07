<?php
namespace Korobochkin\MakerMariupol\MetaBoxes\Intro;

use Korobochkin\MakerMariupol\Meta\Intro\Meta as IntroMeta;
use Korobochkin\MakerMariupol\MetaBoxes\Prototypes\MetaBoxAbstract;

class MetaBox extends MetaBoxAbstract {

	public function __construct() {
		$this->setId('maker_mariupol_intro');
		$this->setTitle(__('Intro', 'maker_mariupol'));
		$this->setContext('maker_mariupol_after_title');
	}

	public function save($post_id, $post, $update) {
		// Our settings presented in request?
		if( !isset( $_POST['maker_mariupol_intro'] ) ) {
			return;
		}
		$value = stripcslashes( $_POST['maker_mariupol_intro'] );
		$meta = new IntroMeta();
		$meta->setPostId($post_id);
		$meta->updateValue($value);
	}

	public function render() {
		$meta = new IntroMeta();
		$meta->setPostId(get_the_ID());
		$value = $meta->getValue();
		printf(
			'<textarea name="%1$s" rows="5" class="large-text">%2$s</textarea>',
			esc_attr($this->getId()),
			esc_textarea($value)
		);
	}
}
