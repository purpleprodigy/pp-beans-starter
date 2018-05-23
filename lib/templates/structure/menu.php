<?php

add_action( 'wp', 'pp_set_up_menu_structure' );
/**
 * Set up the menu structure.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_set_up_menu_structure() {
//remove the button class and the word 'Menu', from hamburger icon on mobile.
	beans_remove_attribute( 'beans_primary_menu_offcanvas_button', 'class', 'uk-button' );
	beans_remove_output( 'beans_offcanvas_menu_button' );
	beans_remove_attribute( 'beans_widget_panel_offcanvas_menu', 'class', 'uk-panel-box' );
}

beans_remove_action( 'beans_primary_menu' );

add_action( 'beans_header_after_markup', 'pp_move_nav_under_header' );
/**
 * Reposition the primary menu to below the header.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_move_nav_under_header() {
	beans_open_markup_e( 'pp_primary_nav', 'div', array( 'class' => 'pp-primary-nav' ) );

	    include _get_child_theme_directory() . '/views/primary-nav.php';

	beans_close_markup_e( 'pp_primary_nav', 'div' );
}
