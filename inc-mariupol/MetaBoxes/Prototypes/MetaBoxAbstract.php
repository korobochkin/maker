<?php
namespace Korobochkin\MakerMariupol\MetaBoxes\Prototypes;

abstract class MetaBoxAbstract {

	private $id;

	private $title;

	private $screen = null;

	private $context = 'advanced';

	private $priority = 'default';

	private $callback_args = null;

	public function add() {
		add_meta_box(
			$this->getId(),
			$this->getTitle(),
			array( $this, 'render' ),
			$this->getScreen(),
			$this->getContext(),
			$this->getPriority(),
			$this->getCallbackArgs()
		);
	}

	public function savePost($post_id, $post, $update) {
		// Stop on autosave (see heartbeat_received() in this class for autosavings)
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Prevent quick edit from clearing custom fields
		if( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		$this->save($post_id, $post, $update);
	}

	abstract public function save($post_id, $post, $update);

	abstract public function render();

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId( $id ) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param mixed $title
	 */
	public function setTitle( $title ) {
		$this->title = $title;
	}

	/**
	 * @return mixed
	 */
	public function getScreen() {
		return $this->screen;
	}

	/**
	 * @param mixed $screen
	 */
	public function setScreen( $screen ) {
		$this->screen = $screen;
	}

	/**
	 * @return mixed
	 */
	public function getContext() {
		return $this->context;
	}

	/**
	 * @param mixed $context
	 */
	public function setContext( $context ) {
		$this->context = $context;
	}

	/**
	 * @return mixed
	 */
	public function getPriority() {
		return $this->priority;
	}

	/**
	 * @param mixed $priority
	 */
	public function setPriority( $priority ) {
		$this->priority = $priority;
	}

	/**
	 * @return mixed
	 */
	public function getCallbackArgs() {
		return $this->callback_args;
	}

	/**
	 * @param mixed $callback_args
	 */
	public function setCallbackArgs( $callback_args ) {
		$this->callback_args = $callback_args;
	}
}
