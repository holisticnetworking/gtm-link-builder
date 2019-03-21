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
	 * A single example test.
	 */
	public function test_sample() {
		global $gtm_link_builder;
		$this->assertTrue( ! empty( $gtm_link_builder ) );
	}
}
