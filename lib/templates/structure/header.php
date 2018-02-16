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

	//sticky header
	beans_add_attribute( 'beans_header', 'data-uk-sticky', "{top:-300, animation:'uk-animation-slide-top'}" );

	// Breadcrumb
	beans_remove_action( 'beans_breadcrumb' );

	//top bar
	add_action( 'beans_header_before_markup', 'pp_display_top_bar' );
    beans_remove_attribute('beans_widget_panel_top-bar','class','uk-panel-box');
    beans_add_attribute('beans_widget_panel_top-bar','class','uk-hidden-small');

}

/**
 * Display top bar
 *
 * @since 1.0.0
 *
 * @return void
 */
function pp_display_top_bar(){

	if(!is_active_sidebar('top-bar')){
		return;
	} ?>

    <div class="top-bar">
        <div class="uk-container uk-container-center">
			<?php echo beans_widget_area( 'top-bar' ); ?>
        </div>
    </div>

<?php }
