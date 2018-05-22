<?php

/**
 * Checks if the theme's developer compiled styles should be enqueued or not.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function pp_use_dev_compiled_styles() {

	if ( ! _beans_is_compiler_dev_mode() ) {
		return false;
	}

	if ( ! (bool) get_option( 'css_dev_mode', false ) ) {
		return false;
	}

	return file_exists( CHILD_THEME_DIR . '/assets/less/style.css' );
}

// Development CSS
if ( pp_use_dev_compiled_styles() ) {
	add_action( 'wp_enqueue_scripts', 'pp_enqueue_dev_styles' );
} else {
// Production CSS, autocompile
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
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/assets/less/style.css' );
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
	beans_uikit_enqueue_theme( 'beans_child', CHILD_THEME_DIR . '/assets/less/theme' );

// Enqueue LESS files to the UIkit compiler.
	beans_compiler_add_fragment( 'uikit', array(
		CHILD_THEME_DIR . '/assets/less/core/base.less',
		CHILD_THEME_DIR . '/assets/less/core/overlay.less',
		CHILD_THEME_DIR . '/assets/less/core/variables.less',
		CHILD_THEME_DIR . '/assets/less/layout/default.less',
		CHILD_THEME_DIR . '/assets/less/layout/social.less',
		CHILD_THEME_DIR . '/assets/less/layout/content.less',
		CHILD_THEME_DIR . '/assets/less/layout/header.less',
		CHILD_THEME_DIR . '/assets/less/layout/footer.less',
		CHILD_THEME_DIR . '/assets/less/layout/pages.less',
		CHILD_THEME_DIR . '/assets/less/layout/widgets.less',
		CHILD_THEME_DIR . '/assets/less/utilities/mixins.less',

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
		CHILD_THEME_DIR . '/assets/js/animatedtext.js',
		CHILD_THEME_DIR . '/assets/js/theme.js'
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

add_action( 'wp_enqueue_scripts', 'pp_enqueue_scripts' );
/**
 * Enqueues theme's scripts.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_enqueue_scripts() {
	wp_enqueue_script(
		'gtag-script',
		get_stylesheet_directory_uri() . '/assets/js/gtag-min.js',
		array(),
		filemtime( CHILD_THEME_DIR . '/assets/js/gtag-min.js' )
	);
}
