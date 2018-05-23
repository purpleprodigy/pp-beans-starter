<?php

beans_add_filter( 'beans_favicon_attributes', 'pp_add_custom_favicon' );
/**
 * Adds Custom Favicon.
 *
 * @since 1.0.0
 *
 * @param array $attributes An array of favicon HTML attributes.
 *
 * @return array
 */
function pp_add_custom_favicon( array $attributes ) {
	$attributes['href'] = get_stylesheet_directory_uri() . '/assets/images/favicon.ico';

    return $attributes;
}
