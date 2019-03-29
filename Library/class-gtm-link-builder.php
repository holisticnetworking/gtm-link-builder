<?php
/**
 * GTM LInk Builder
 */
namespace Gtm_Link_Builder\Library;
use Gtm_Link_Builder\Library\Gtm_Link_Builder_Link as Link;

class Gtm_Link_Builder {
	protected $label = null;
	protected $category = null;

	public function __construct( $args = null ) {
		if( ! empty( $args ) ) {
			$this->label    = ! empty( $args['label'] ) ? esc_attr( $args['label'] ) : '%post_title%';
			$this->category = ! empty( $args['category'] ) ? esc_attr( $args['category'] ) : 'Internal Link';
		}
	}

	/**
	 * @return string|void|null
	 */
	public function get_label() {
		return $this->label;
	}

	/**
	 * @return string|void|null
	 */
	public function get_category() {
		return $this->category;
	}

	public function link( $args ) {
		$link = null;
		if( ! empty( $args['url'] ) ) {
			$link = new Link(
				[
					'label'      => ! empty( $args['label'] ) ? esc_attr( $args['label'] ) : $this->label,
					'category'   => ! empty( $args['category'] ) ? esc_attr( $args['category'] ) : $this->category,
					'attributes' => ! empty( $args['attributes'] ) ? esc_attr( $args['attributes'] ) : null,
					'url'        => ! empty( $args['url'] ) ? esc_attr( $args['url'] ) : null,
					'text'       => ! empty( $args['label'] ) ? esc_attr( $args['label'] ) : null,
				]
			);
		} else {
			$link = null;
		}
		return $link->link();
	}
}