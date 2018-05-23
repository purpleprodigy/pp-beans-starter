<?php

add_action( 'widgets_init', 'pp_register_widget_areas' );
/**
 * Register the widget areas.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_register_widget_areas() {
	$widgets_areas = require_once _get_child_theme_directory() . '/config/widgets.php';

	foreach ( $widgets_areas as $widget_area ) {
		beans_register_widget_area( $widget_area );
	}
}
