<?php

class Remove_Action_Example extends WP_UnitTestCase {

	/**
	 * setUp is a built-in method that allows you to.. set up.. your unit testing data applicable to the tests you need
	 */
	function setUp() {
		parent::setUp();
	}

	/**
	 * tearDown is a built-in method that allows you to reset any data you setup
	 */
	function tearDown() {
		parent::tearDown();
	}

	/**
	 * Tests that we are removing the action for the breadcrumbs
	 *
	 * remove_action() returns true if the action was removed, and null if it was not removed.
	 * That means we can return the value of remove_action() and then test against it.
	 *
	 * You have to add the action manually, because in this case WooCommerce is not bootstraped or
	 * or possibly even present in my test repository.
	 */
	function testBreadCrumbRemoval(){

		add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
		$value = remove_woocommerce_breadcrumb();

		$this->assertTrue( $value, 'Looks like we did NOT remove the breadcrumb action' );
	}

}
