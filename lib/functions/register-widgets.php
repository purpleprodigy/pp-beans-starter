<?php
add_action( 'widgets_init', 'pp_register_widget_areas' );
/**
 * Register your widget areas here
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_register_widget_areas() {

	$widgets_areas = array(

		array(
			'name'        => __( 'Home Slideshow', CHILD_TEXT_DOMAIN ),
			'id'          => 'home-slideshow',
			'beans_type'  => 'grid',
			'description' => __( 'This is the widget area for the slideshow on the home page.', CHILD_TEXT_DOMAIN )
		),
		array(
			'name'        => __( 'Top Right', CHILD_TEXT_DOMAIN ),
			'id'          => 'top-bar',
			'beans_type'  => 'grid',
			'description' => __( 'This is the widget area for the top bar.', CHILD_TEXT_DOMAIN )
		),
		array(
			'name'        => __( 'Footer Widget 1', CHILD_TEXT_DOMAIN ),
			'id'          => 'footer-widget-1',
			'beans_type'  => 'grid',
			'description' => __( 'This is the widget area for footer widget 1.', CHILD_TEXT_DOMAIN )
		),
		array(
			'name'        => __( 'Footer Widget 2', CHILD_TEXT_DOMAIN ),
			'id'          => 'footer-widget-2',
			'beans_type'  => 'grid',
			'description' => __( 'This is the widget area for footer widget 3.', CHILD_TEXT_DOMAIN )
		),
		array(
			'name'        => __( 'Footer Widget 3', CHILD_TEXT_DOMAIN ),
			'id'          => 'footer-widget-3',
			'beans_type'  => 'grid',
			'description' => __( 'This is the widget area for footer widget 3.', CHILD_TEXT_DOMAIN )
		),
	);

	foreach ( $widgets_areas as $widget_area ) {

		beans_register_widget_area( $widget_area );


	}
}

