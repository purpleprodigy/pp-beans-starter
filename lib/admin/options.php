<?php

add_action( 'admin_init', 'pp_beans_child_options' );
/**
 * Options for Purple Prodigy Beans Child Theme.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_beans_child_options() {

	$fields = array(
		array(
			'id'          => 'css_dev_mode',
			'label'       => 'CSS dev mode',
			'description' => __( 'Check this if you want to use your own compiler during development in
			order to enjoy source maps and live reload, uncheck it in production', CHILD_TEXT_DOMAIN ),
			'type'        => 'checkbox',
			'default'     => false
		),

	);

	beans_register_options( $fields, 'beans_settings', 'options', array( 'title' => 'CSS dev mode' ) );
}
