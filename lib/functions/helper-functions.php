<?php

// Add Google Analytics gtag script file to the <head>.
add_action( 'wp_head', 'add_google_analytics_to_header_scripts' );

function add_google_analytics_to_header_scripts() {
	include_once CHILD_THEME_DIR . '/assets/js/gtag-min.js';
}
