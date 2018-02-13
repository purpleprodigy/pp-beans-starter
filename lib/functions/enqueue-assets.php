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
 * Enqueue styles when in Development CSS mode.
 *
 * @since 1.0.0
 *
 * @return void
 */

function pp_enqueue_dev_styles() {
	//Development CSS mode: available to css injection and source maps through Codekit, gulp or grunt.

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/lib/assets/less/css/style.css' );
}

/**
 * Enqueue styles in production.
 *
 * @since 1.0.0
 *
 * @return void
 */

function pp_enqueue_styles() {
//Production css mode: autocompile.

//	Enqueue custom UIkit styles and overwrite with the theme folder.
	beans_uikit_enqueue_theme( 'beans_child', CHILD_URL . '/lib/assets/less/theme' );

// Enqueue LESS files to the UIkit compiler
	beans_compiler_add_fragment( 'uikit', array(
		CHILD_URL . '/lib/assets/less/partials/fonts.less',
		CHILD_URL . '/lib/assets/less/partials/default.less',
		CHILD_URL . '/lib/assets/less/layout/header.less',
		CHILD_URL . '/lib/assets/less/layout/footer.less',
		CHILD_URL . '/lib/assets/less/core/nav.less',
		CHILD_URL . '/lib/assets/less/layout/sidebar.less',
		CHILD_URL . '/lib/assets/less/layout/widgets.less',
		CHILD_URL . '/lib/assets/less/partials/content.less',
		CHILD_URL . '/lib/assets/less/layout/pages.less',
		CHILD_URL . '/lib/assets/less/utilities/mixins.less',
		CHILD_URL . '/lib/assets/less/components/slideshow.less',
		CHILD_URL . '/lib/assets/less/core/nav.less',
		CHILD_URL . '/lib/assets/less/core/variables.less',

	), 'less' );
}

beans_add_smart_action( 'beans_uikit_enqueue_scripts', 'pp_enqueue_uikit_assets', 5 );
/**
 * Enqueue UIkit assets
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_enqueue_uikit_assets() {

	beans_compiler_add_fragment( 'uikit', array(
		CHILD_LIB . '/lib/assets/js/animatedtext.js',
		CHILD_LIB . '/lib/assets/js/theme.js'
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
	wp_enqueue_style( 'pp-google-fonts', 'https://fonts.googleapis.com/css?family=Lato|Oswald:300,400,500|Raleway:300,300i,400,400i,600', false );
}
