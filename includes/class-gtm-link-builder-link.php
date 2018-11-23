<?php
/**
 * GTM Link Builder Link file
 */

/**
 * Class Gtm_Link_Builder_Link
 *
 * The object that places links on the page.
 *
 * @package Gtm_Link_Builder
 */
class Gtm_Link_Builder_Link {
	/**
	 * @var int|null|string
	 */
	protected $post_id = null;
	/**
	 * @var int|null|string
	 */
	protected $id = null;
	/**
	 * @var null
	 */
	protected $category = null;
	/**
	 * @var null
	 */
	protected $label = null;
	/**
	 * @var null
	 */
	protected $class = null;
	/**
	 * @var null
	 */
	protected $link_text = null;

	/**
	 * Gtm_Link_Builder_Link constructor.
	 *
	 * @param mixed null/int/array $args Either a post_id to link to or else
	 */
	public function __construct( $args=null ) {
		if( is_array( $args ) ) {
			$this->id = ! empty( $args['id'] ) ? sanitize_text_field( $args['id'] ) : 1;
			$this->category = ! empty( $args['category'] ) ? sanitize_text_field( $args['category'] ) : null;
			$this->label = ! empty( $args['label'] ) ? sanitize_text_field( $args['label'] ) : null;
			$this->class = ! empty( $args['class'] ) ? sanitize_text_field( $args['id'] ) : null;
			$this->link_text = ! empty( $args['link_text'] ) ? sanitize_text_field( $args['link_text'] ) : null;
		} elseif( is_numeric( $args ) ) {
			$this->id = $args;
		} else {
			return true;
		}
		return null;
	}

	/**
	 * @return string
	 */
	public function link() {
		return sprintf(
			'<a href="%1$s" %2$s %3$s %4$s %5$s>%6$s</a>',
			'https://google.com',
			$this->get_class(),
			$this->get_id(),
			$this->get_label(),
			$this->get_category(),
			$this->get_link_text()
		);
	}

	/**
	 * @return int|null|string
	 */
	public function get_id() {
		if( ! empty( $this->id ) ) {
			return sprintf(
				'id="%s"',
				$this->id
			);
		}
		return null;
	}

	/**
	 * @return null
	 */
	public function get_category() {
		if( ! empty( $this->category ) ) {
			return sprintf(
				'data-emacategory="%s"',
				$this->category
			);
		}
		return null;
	}

	/**
	 * @return null
	 */
	public function get_label() {
		if( ! empty( $this->label ) ) {
			return sprintf(
				'data-emalabel="%s"',
				$this->label
			);
		}
		return null;
	}

	/**
	 * @return null
	 */
	public function get_class() {
		if( ! empty( $this->class ) ) {
			return sprintf(
				'class="%s"',
				$this->class
			);
		}
		return null;
	}

	/**
	 * @return null
	 */
	public function get_link_text() {
		return $this->link_text;
	}

}
