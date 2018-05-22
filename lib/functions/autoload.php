<?php

/**
 * Load non admin files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_load_nonadmin_files() {
	$filenames = array(
		'setup.php',
		'assets/enqueuer.php',
		'assets/favicon.php',
		'functions/register-widgets.php',
		'functions/social-menu.php',
		'templates/structure/header.php',
		'templates/structure/post.php',
		'templates/structure/sidebar.php',
		'templates/structure/menu.php',
		'templates/structure/footer.php',
	);
	pp_load_specified_files( $filenames );
}

/**
 * Load admin files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_load_admin_files() {
	$filenames = array(
		'admin/options.php',
	);
	pp_load_specified_files( $filenames );
}

/**
 * Load each of the specified files.
 *
 * @since 1.0.0
 *
 * @param array $filenames
 * @param string $folder_root
 *
 * @return void
 */
function pp_load_specified_files( array $filenames, $folder_root = '' ) {
	$folder_root = $folder_root ?: _get_child_theme_directory() . '/';
	foreach ( $filenames as $filename ) {
		include( $folder_root . $filename );
	}
}

pp_load_nonadmin_files();
pp_load_admin_files();
