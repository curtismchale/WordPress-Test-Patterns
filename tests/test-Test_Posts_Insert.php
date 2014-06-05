<?php

/**
 * Simple extended test class testing wp_insert_post
 */
class Test_Posts_Insert extends WP_UnitTestCase {

	/**
	 * to understand setUp, view Setup_Teardown_Example.php
	 */
	function setUp() {
		parent::setUp();

		$this->author = new WP_User( $this->factory->user->create( array( 'role' => 'editor' ) ) );

		$post = array(
			'post_author'  => $this->author->ID,
			'post_status'  => 'publish',
			'post_content' => rand_str(),
			'post_title'   => rand_str(),
		);

		// insert a post
		$this->post_id = wp_insert_post($post);
	}

	/**
	 * to understand tearDown, view Setup_Teardown_Example.php
	 */
	function tearDown() {
		parent::tearDown();
		wp_delete_post( $this->post_id );
	}

	/**
	 * Verify that if 'updating' a post w/o the required data, it is considered empty and returns 0.
	 * The post is considered "empty" if both:
	 * 1. The post type supports the title, editor, and excerpt fields
	 * 2. The title, editor, and excerpt fields are all empty
	 */
	function test_insert_post_returns_0() {

		$post = get_post( $this->post_id );

		$updated_id = wp_insert_post( array(
			'ID'           => $this->post_id,
			'post_name'    => 'post_before_post_name',
		) );

		$this->assertEquals( 0, $this->post_id );

	}

	/**
	 * Verify that if 'updating' a post w/ the required data, it returns the post ID indicating success
	 */
	function test_insert_post_returns_id() {

		$post = get_post( $this->post_id );

		$updated_id = wp_insert_post( array(
			'ID'           => $this->post_id,
			'post_name'    => 'post_before_post_name',
			'post_content' => 'filler',
		) );

		$this->assertEquals( $updated_id, $this->post_id );

	}

}
