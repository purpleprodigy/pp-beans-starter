<?php

add_action( 'admin_init', 'pp_register_options_with_beans' );
/**
 * Add Options Beans Settings for Purple Prodigy Beans Child Theme.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_register_options_with_beans() {
	$fields = array(
		array(
			'id'          => 'pp_slideshow',
			'label'       => 'Slideshow',
			'description' => __( 'Check this if you want display a slideshow on your home page. To use the slideshow option, add required images to the featured image of individual posts using the slideshow category.', 'pp-beans-starter' ),
			'type'        => 'checkbox',
			'default'     => false
		),
	);

	beans_register_options( $fields, 'beans_settings', 'options', array( 'title' => 'Purple Prodigy Child Theme Options' ) );
}
