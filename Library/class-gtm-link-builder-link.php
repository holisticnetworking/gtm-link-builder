<?php
/**
 * Link builder link class
 */
namespace Gtm_Link_Builder\Library;

class Gtm_Link_Builder_Link {
	protected $label = null;
	protected $category = null;
	protected $attributes = null;
	protected $url = null;
	protected $text = null;

	public function __construct( $data=null ) {
		if( empty( $data ) ) {
			return null;
		} else {
			$this->label      = ! empty( $data['label'] ) ? esc_attr( $data['label'] ) : null;
			$this->category   = ! empty( $data['category'] ) ? esc_attr( $data['category'] ) : null;
			$this->attributes = ! empty( $data['attributes'] ) ? $this->set_attributes( $data['attributes'] ) : null;
			$this->url        = ! empty( $data['url'] ) ? esc_url( $data['url'] 0 : null;
			$this->text       = ! empty( $data['text'] ) ? esc_html( $data['text'] ) : null;
		}
	}

	/**
	 * @param null $attributes
	 * @return array An array of escaped HTML attributes
	 */
	public function set_attributes( $attributes ) {
		$formatted = [];
		if( !empty( $attributes ) ) {
			foreach( $attributes as $name => $value ) {
				$formatted[$name] = esc_attr( $value );
			}
		}
		return $formatted;
	}

	public function get_attributes() {
		$attr_array = [];
		foreach( $this->attributes as $name => $value ) {
			$attr_array[] = sprintf( '%s="%s"', $name, $value );
		}
		return implode( ' ', $attr_array );
	}

	public function link() {
		return sprintf(
			'<a href="%1$s" %6$s="%2$s" %7$s="%3$s" %4$s >%5$s</a>',
			$this->url,
			$this->category,
			$this->label,
			$this->get_attributes(),
			$this->text,
			$this->category_slug,
			$this->label_slug
		);
	}
}