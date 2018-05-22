<?php

/**
 * Gets the child theme's absolute directory path.
 *
 * @since  1.0.0
 * @ignore
 * @access private
 *
 * @return string
 */
function _get_child_theme_directory() {
	return __DIR__;
}

/**
 * Gets the URI to the root of the child theme.
 *
 * @since  1.0.0
 * @ignore
 * @access private
 *
 * @return string
 */
function _get_child_theme_uri() {
	static $uri;

	if ( is_null( $uri ) ) {
		$uri = get_stylesheet_directory_uri();
	}

	return $uri;
}

// Include Beans. Do not remove the line below.
require_once get_template_directory() . '/lib/init.php';

include_once 'lib/functions/autoload.php';
