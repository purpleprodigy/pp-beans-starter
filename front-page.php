<?php

//add_action( 'beans_header_after_markup', 'pp_subheader_content' );
///**
// * Add full width custom content below header.
// *
// * @since 1.0.0
// *
// * @return void
// */
//function pp_subheader_content() {
//	?>
<!--    <div class="uk-block">-->
<!--        Some full width custom content.-->
<!--    </div>-->
<!--	--><?php
//}


$pp_slideshow_enabled = (bool) get_option( 'pp_slideshow', false );

if ( $pp_slideshow_enabled ) {

	add_action( 'beans_fixed_wrap[_main]_prepend_markup', 'pp_home_slider_section' );
	/**
	 * Add slideshow to front page using a category of 'slideshow'.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function pp_home_slider_section() {

		$query = new WP_Query( array(
			'category_name'  => 'slideshow',
			'paged'          => get_query_var( 'paged' ),
			'nopaging'       => false,
			'posts_per_page' => 3
		) );

		include_once CHILD_THEME_DIR .'/views/slideshow.php';

	}
}

beans_modify_action_callback( 'beans_loop_template', 'pp_latest_posts_in_responsive_grid_view' );
/**
 * Replace the Beans loop with a custom posts loop in a responsive grid layout.
 * Adjust $posts to the desired number of posts to be displayed.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_latest_posts_in_responsive_grid_view() {
	$posts = get_posts( array( 'posts_per_page' => 6 ) );

	include_once CHILD_THEME_DIR .'/views/home-latest-posts.php';

}

add_action( 'beans_footer_before_markup', 'pp_pre_footer_content' );
/**
 * Add some pre footer custom static content.
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_pre_footer_content() {
	?>
    <div class="uk-block uk-block-secondary">
    pre footer content
    </div>
	<?php
}

beans_load_document();
