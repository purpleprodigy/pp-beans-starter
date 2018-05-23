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

	return file_exists( _get_child_theme_directory() . '/assets/less/style.css' );
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
	wp_enqueue_style( 'child-style', _get_child_theme_uri() . '/assets/less/style.css' );
}

/**
 * Enqueue styles in production using Beans Compiler API.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_enqueue_styles() {
	$theme_dir = _get_child_theme_directory();

	//	Enqueue custom UIkit styles and overwrite with the theme folder.
	beans_uikit_enqueue_theme( 'beans_child', $theme_dir . '/assets/less/theme' );

	// Enqueue LESS files to the UIkit compiler.
	beans_compiler_add_fragment( 'uikit', array(
		$theme_dir . '/assets/less/core/base.less',
		$theme_dir . '/assets/less/core/overlay.less',
		$theme_dir . '/assets/less/core/variables.less',
		$theme_dir . '/assets/less/layout/default.less',
		$theme_dir . '/assets/less/layout/social.less',
		$theme_dir . '/assets/less/layout/content.less',
		$theme_dir . '/assets/less/layout/header.less',
		$theme_dir . '/assets/less/layout/footer.less',
		$theme_dir . '/assets/less/layout/pages.less',
		$theme_dir . '/assets/less/layout/widgets.less',
		$theme_dir . '/assets/less/utilities/mixins.less',
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
	$theme_dir = _get_child_theme_directory();

	beans_compiler_add_fragment( 'uikit', array(
		$theme_dir . '/assets/js/animatedtext.js',
		$theme_dir . '/assets/js/theme.js'
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
		_get_child_theme_uri() . '/assets/js/gtag-min.js',
		array(),
		filemtime( _get_child_theme_directory() . '/assets/js/gtag-min.js' )
	);
}
