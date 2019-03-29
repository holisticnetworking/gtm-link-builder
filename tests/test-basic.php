<?php
/**
 * Class SampleTest
 *
 * @package Gtm_Builder_Pre
 */

/**
 * Sample test case.
 */
class TestBasic extends WP_UnitTestCase {

	/**
	 * Simply confirm that the object exists in the global space
	 */
	public function text_exists() {
		global $gtm_link_builder;
		$this->assertTrue( ! empty( $gtm_link_builder ) );
	}

	public function test_default_values() {
		global $gtm_link_builder;
		$this->assertTrue( is_string( $gtm_link_builder->get_category() ) && is_string( $gtm_link_builder->get_label() ) );
	}
}
