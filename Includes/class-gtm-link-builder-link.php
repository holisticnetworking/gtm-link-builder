<?php
namespace Gtm_Link_Builder\Includes;

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
	 * A list of recognized, safe attribute elements.
	 *
	 * @var array
	 */
	private $html_attributes = array(
		'accesskey', 'align', 'background', 'bgcolor', 'class', 'contenteditable', 'contextmenu',
		'draggable', 'height', 'hidden', 'id', 'item', 'itemprop', 'spellcheck', 'style',
		'subject', 'tabindex', 'title', 'valign', 'width',
	);
	/**
	 * @var null
	 */
	protected $url = null;
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
	protected $link_text = null;
	/**
	 * @var array
	 */
	protected $attributes = [];

	/**
	 * Gtm_Link_Builder_Link constructor.
	 *
	 * @param mixed null/array $args Expected array of arguments
	 *
	 * @return boolean Pass/Fail
	 */
	public function __construct( $args=null ) {
		if( is_array( $args ) ) {
			$this->url        = ! empty( $args['url'] ) ? esc_url( $args['url'] ) : null;
			$this->category   = ! empty( $args['category'] ) ? sanitize_text_field( $args['category'] ) : null;
			$this->label      = ! empty( $args['label'] ) ? sanitize_text_field( $args['label'] ) : null;
			$this->link_text  = ! empty( $args['link_text'] ) ? sanitize_text_field( $args['link_text'] ) : null;
			$this->set_attributes( $args );
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @return string
	 */
	public function link() {
		return sprintf(
			'<a href="%1$s" %2$s %3$s %4$s>%5$s</a>',
			'https://google.com',
			$this->do_attributes(),
			$this->get_label(),
			$this->get_category(),
			$this->get_link_text()
		);
	}

	/**
	 * @return null
	 */
	public function get_url() {
		return $this->url;
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
	public function get_link_text() {
		return $this->link_text;
	}

	public function set_attributes( $args=null ) {
		foreach( $this->html_attributes as $att ) {
			if( key_exists( $att, $args ) ) {
				$this->attributes[ $att ] = esc_attr( $args[ $att ] );
			}
		}
	}

	/**
	 * Concatenates $this->attributes into a string of HTML attributes, separated by spaces.
	 * @return string
	 */
	public function do_attributes() {
		return implode( ' ', $this->attributes );
	}

}
