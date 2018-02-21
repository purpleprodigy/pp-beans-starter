<?php

$css_dev_mode_enabled = (bool) get_option( 'css_dev_mode', false );

//Development CSS
if ( $css_dev_mode_enabled ) {
	add_action( 'wp_enqueue_scripts', 'pp_enqueue_dev_styles' );
} else {
//Production CSS, autocompile
	add_action( 'beans_uikit_enqueue_scripts', 'pp_enqueue_styles', 5 );
}
/**
 * Enqueue styles when in Development CSS mode so we can view sourcemaps.
 *
 * @since 1.0.0
 *
 * @return void
 */

function pp_enqueue_dev_styles() {
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/lib/assets/less/style.css' );
}

/**
 * Enqueue styles in production using Beans Compiler API.
 *
 * @since 1.0.0
 *
 * @return void
 */

function pp_enqueue_styles() {
//	Enqueue custom UIkit styles and overwrite with the theme folder.
	beans_uikit_enqueue_theme( 'beans_child', CHILD_LIB . '/assets/less/theme' );

// Enqueue LESS files to the UIkit compiler.
	beans_compiler_add_fragment( 'uikit', array(
		CHILD_LIB . '/assets/less/core/base.less',
		CHILD_LIB . '/assets/less/core/overlay.less',
		CHILD_LIB . '/assets/less/core/variables.less',
		CHILD_LIB . '/assets/less/layout/default.less',
		CHILD_LIB . '/assets/less/layout/content.less',
		CHILD_LIB . '/assets/less/layout/header.less',
		CHILD_LIB . '/assets/less/layout/footer.less',
		CHILD_LIB . '/assets/less/layout/pages.less',
		CHILD_LIB . '/assets/less/layout/widgets.less',
		CHILD_LIB . '/assets/less/utilities/mixins.less',

	), 'less' );
}

beans_add_smart_action( 'beans_uikit_enqueue_scripts', 'pp_enqueue_uikit_assets', 5 );
/**
 * Enqueue UIkit assets using Beans Compiler API.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_enqueue_uikit_assets() {
	beans_compiler_add_fragment( 'uikit', array(
		CHILD_LIB . '/assets/js/animatedtext.js',
		CHILD_LIB . '/assets/js/theme.js'
	), 'js' );

	beans_uikit_enqueue_components( array(
		'contrast',
		'cover',
		'animation',
		'modal',
		'overlay',
		'column',
		'switcher',
		'scrollspy'
	) );
	beans_uikit_enqueue_components( array(
		'sticky',
		'slideshow',
		'slider',
		'lightbox',
		'grid',
		'parallax',
		'dotnav',
		'slidenav'
	),
		'add-ons' );

}

// Google fonts
add_action( 'wp_enqueue_scripts', 'pp_add_google_fonts' );
/**
 * Enqueue Google fonts.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_add_google_fonts() {
	wp_enqueue_style( 'pp-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i|Raleway:300,400,600', false );
}
