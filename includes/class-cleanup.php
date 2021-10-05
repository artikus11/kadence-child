<?php

namespace Art\Kadence_Child;

class Cleanup {

	public function __construct() {

		add_action( 'after_setup_theme', [ $this, 'start_cleanup' ] );
		add_action( 'init', [ $this, 'cleanup_head' ] );
	}

	/**
	 * Clean up WordPress defaults
	 */
	public function start_cleanup() {

		// Remove WP version from RSS.
		add_filter( 'the_generator', '__return_empty_string' );
	}

	/**
	 * Clean up head.+
	 */
	public function cleanup_head() {

		// EditURI link.
		remove_action( 'wp_head', 'rsd_link' );
		// Category feed links.
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		// Post and comment feed links.
		remove_action( 'wp_head', 'feed_links', 2 );
		// Windows Live Writer.
		remove_action( 'wp_head', 'wlwmanifest_link' );
		// Index link.
		remove_action( 'wp_head', 'index_rel_link' );
		// Previous link.
		remove_action( 'wp_head', 'parent_post_rel_link', 10 );
		// Start link.
		remove_action( 'wp_head', 'start_post_rel_link', 10 );
		// Canonical.
		remove_action( 'wp_head', 'rel_canonical', 10 );
		// Shortlink.
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
		// Links for adjacent posts.
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
		// WP version.
		remove_action( 'wp_head', 'wp_generator' );

		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	}

}

new Cleanup();


