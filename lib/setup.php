<?php

add_action( 'after_setup_theme', 'pp_set_up_child_theme' );
/**
 * Set up the child theme.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_set_up_child_theme() {
	$setup_config = require _get_child_theme_directory() . '/config/setup.php';

	foreach( $setup_config as $setup_task => $config ) {
		$func_name = "pp_{$setup_task}";

		$func_name( $config );
	}
}

/**
 * Add theme supports.
 *
 * @since 1.0.0
 *
 * @param array $config Theme supports to add.
 *
 * @return void
 */
function pp_add_theme_support( array $config ) {

	foreach ( $config as $feature => $args ) {
		add_theme_support( $feature, $args );
	}
}

/**
 * Add new image sizes.
 *
 * @since 1.0.0
 *
 * @param array $config Image sizes to add.
 *
 * @return void
 */
function pp_add_image_size( array $config ) {

	foreach ( $config as $name => $args ) {
		$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;

		add_image_size( $name, $args['width'], $args['height'], $crop );
	}
}
