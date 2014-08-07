<?php

/**
 * Simple extended test class to demonstrate setup/teardown methods
 */
class Setup_Teardown_Example extends WP_UnitTestCase {

	/**
	 * setUp is a built-in method that allows you to.. set up.. your unit testing data applicable to the tests you need
	 */
	function setUp() {
		parent::setUp();

		// Make a fake user
		$this->author = new WP_User( $this->factory->user->create( array( 'role' => 'editor' ) ) );

		// Make a temporary fake post
		$this->post_id = wp_insert_post( array(
			'post_author'  => $this->author->ID,
			'post_status'  => 'publish',
			'post_content' => rand_str(),
			'post_title'   => rand_str(),
		) );
	}

	/**
	 * tearDown is a built-in method that allows you to reset any data you setup
	 */
	function tearDown() {
		parent::tearDown();

		// Delete fake temporary post
		wp_delete_post( $this->post_id );
	}

	/**
	 * Just a simple test that demonstrates setUp and tearDown is working
	 */
	function test_post_id_is_int() {
		// Determine we actually have a post ID
		$this->assertTrue( 0 !== $this->post_id && is_int( $this->post_id ) );
	}
}
