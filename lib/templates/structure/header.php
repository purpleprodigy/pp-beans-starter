<?php

add_action( 'wp', 'pp_set_up_header_structure' );
/**
 * Set up header structure
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_set_up_header_structure() {
	// Remove Tagline
	beans_remove_action( 'beans_site_title_tag' );

	// Sticky Header
	beans_add_attribute( 'beans_header', 'data-uk-sticky', "{top:-300, animation:'uk-animation-slide-top'}" );

	// Remove Breadcrumbs
	beans_remove_action( 'beans_breadcrumb' );

	// Display Above Header Widget and Header Widget
	add_action( 'beans_header_before_markup', 'pp_display_above_header_widget' );
	add_action( 'beans_header', 'pp_display_header_widget' );

	beans_remove_attribute( 'beans_widget_panel_above-header-widget', 'class', 'uk-panel-box' );
	beans_add_attribute( 'beans_widget_panel_above-header-widget', 'class', 'uk-hidden-small' );
}

/**
 * Display the above header widget if not being used as a social menu.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_display_above_header_widget() {

	if ( ! is_active_sidebar( 'above-header-widget' ) || has_nav_menu( 'social-menu' ) ) {
		return;
	}

	include_once _get_child_theme_directory() . '/views/above-header-widget.php';
}

/**
 * Display header right widget.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_display_header_widget() {

	if ( ! is_active_sidebar( 'header-right-widget' ) ) {
		return;
	}

	include_once _get_child_theme_directory() . '/views/header-widget.php';
}
