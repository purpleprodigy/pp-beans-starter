<?php

add_action( 'init', 'pp_register_social_menu' );
/**
 * Register Social Menu
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_register_social_menu() {
	register_nav_menu( 'social-menu', 'Social Menu' );
}

beans_add_smart_action( 'beans_header_before_markup', 'pp_social_menu' );
/**
 * Add social menu above the header.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_social_menu() {

	if ( ! has_nav_menu( 'social-menu' ) ) {
		return;
	}

	beans_open_markup_e( 'pp_social_menu-container', 'div', array( 'class' => 'pp-social-menu' ) );
		wp_nav_menu( array(
			'menu'            => 'Social',
			'menu_class'      => 'uk-subnav uk-navbar-flip',
			'container'       => 'div',
			'container_class' => 'uk-container uk-container-center',
			'theme_location'  => 'social-menu',
			'beans_type'      => 'navbar'
		) );
	beans_close_markup_e( 'pp_social_menu-container', 'div' );
}
