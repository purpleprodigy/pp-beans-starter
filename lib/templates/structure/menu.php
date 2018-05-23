<?php

add_action( 'wp', 'pp_set_up_menu_structure' );
/**
 * Set up the menu structure. Removes the button class and the word 'Menu', from hamburger icon on mobile.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_set_up_menu_structure() {
	beans_remove_attribute( 'beans_primary_menu_offcanvas_button', 'class', 'uk-button' );
	beans_remove_output( 'beans_offcanvas_menu_button' );
	beans_remove_attribute( 'beans_widget_panel_offcanvas_menu', 'class', 'uk-panel-box' );
}


// Relocate the primary nav to after the site's header.
beans_replace_action_hook( 'beans_primary_menu', 'beans_header_after_markup' );

beans_add_smart_action( 'beans_primary_menu_before_markup', 'pp_render_opening_primary_nav_container' );
/**
 * Renders the Primary Navigation's opening container markup.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_render_opening_primary_nav_container() {
	beans_open_markup_e( 'pp_primary_nav', 'div', array( 'class' => 'pp-primary-nav' ) );
	    beans_open_markup_e( 'pp_primary_nav[container]', 'div', array( 'class' => 'uk-container uk-container-center' ) );
}

beans_add_smart_action( 'beans_primary_menu_after_markup', 'pp_render_closing_primary_nav_container' );
/**
 * Renders the Primary Navigation's closing container markup.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_render_closing_primary_nav_container() {
	    beans_close_markup_e( 'pp_primary_nav[container]', 'div' );
	beans_close_markup_e( 'pp_primary_nav', 'div' );
}
