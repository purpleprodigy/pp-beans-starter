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
	$widgets_areas = array(
		array(
			'name'        => __( 'Above Header', 'pp-beans-starter' ),
			'id'          => 'above-header-widget',
			'beans_type'  => 'grid',
			'description' => __( 'This is the widget area for above the header.', 'pp-beans-starter' )
		),
		array(
			'name'        => __( 'Header Right', 'pp-beans-starter' ),
			'id'          => 'header-right-widget',
			'beans_type'  => 'grid',
			'description' => __( 'This is the widget area for the right of the header.', 'pp-beans-starter' )
		),
		array(
			'name'        => __( 'Before Footer', 'pp-beans-starter' ),
			'id'          => 'before-footer',
			'beans_type'  => 'grid',
			'description' => __( 'This is the widget area for before the footer widgets.', 'pp-beans-starter' )
		),
		array(
			'name'        => __( 'Footer Widget 1', 'pp-beans-starter' ),
			'id'          => 'footer-widget-1',
			'beans_type'  => 'grid',
			'description' => __( 'This is the widget area for footer widget 1.', 'pp-beans-starter' )
		),
		array(
			'name'        => __( 'Footer Widget 2', 'pp-beans-starter' ),
			'id'          => 'footer-widget-2',
			'beans_type'  => 'grid',
			'description' => __( 'This is the widget area for footer widget 3.', 'pp-beans-starter' )
		),
		array(
			'name'        => __( 'Footer Widget 3', 'pp-beans-starter' ),
			'id'          => 'footer-widget-3',
			'beans_type'  => 'grid',
			'description' => __( 'This is the widget area for footer widget 3.', 'pp-beans-starter' )
		),
	);

	foreach ( $widgets_areas as $widget_area ) {
		beans_register_widget_area( $widget_area );
	}
}
