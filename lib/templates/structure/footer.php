<?php

add_action( 'wp', 'pp_set_up_footer_structure' );
/**
 * Set up the footer widgets.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_set_up_footer_structure() {
	beans_wrap_markup( 'beans_footer', 'beans_footer_wrapper', 'div', array( 'class' => 'tm-footer-wrapper' ) );

	//Footer Widgets
	beans_add_smart_action( 'beans_footer_wrapper_prepend_markup', 'pp_display_footer_widgets' );
	/**
	 * Display the 3 footer widgets.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function pp_display_footer_widgets() {
		if ( ! is_active_sidebar( 'footer-widget-1' ) ) {
			return;
		}

		include_once _get_child_theme_directory() . '/views/footer-widgets.php';
	}
}

// Overwrite the Footer content
beans_modify_action_callback( 'beans_footer_content', 'beans_child_footer_content' );

function beans_child_footer_content() {
	include_once _get_child_theme_directory() . '/views/footer.php';
}
