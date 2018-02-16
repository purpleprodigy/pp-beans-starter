<?php
//remove_all_actions( 'beans_post_body' );

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

	?>

    <div class="uk-slidenav-position uk-margin-large-bottom" data-uk-slideshow="{animation:'scroll',autoplay:'true'}">
        <ul class="uk-slideshow uk-overlay-active">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post();
					$thumb_id        = get_post_thumbnail_id();
					$thumb_url_array = wp_get_attachment_image_src( $thumb_id, 'full', true );
					$resized_src     = beans_edit_image( $thumb_url_array[0], array(
						'resize' => array( 1144, 763, true )
					) );
					?>
                    <li style="animation-duration: 100ms; height: 300px;">
                        <div class="slider-image">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"
                               title="<?php esc_html( get_the_title() ); ?>">
                                <picture><img src="<?php echo $resized_src; ?>"></picture>
                            </a>
                        </div>
                        <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade uk-overlay-bottom uk-flex uk-flex-bottom uk-flex-middle">
                            <div class="uk-width-1-1 uk-text-center">
                                <h2 class="uk-article-title" itemprop="headline"><a href="<?php the_permalink(); ?>"
                                                                                    title="<?php esc_html( the_title() ); ?>"><?php the_title(); ?></a>
                                </h2>
                                <p class="uk-contrast uk-hidden-small"><?php echo $slider_excerpt ?></p>
                                <a class="uk-button uk-button-primary" href="<?php the_permalink(); ?>">READ MORE</a>
                            </div>
                        </div>
                    </li>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
        </ul>
        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
    </div>
	<?php
}

// Add the subheader custom static content.
add_action( 'beans_header_after_markup', 'example_view_subheader_content' );

function example_view_subheader_content() {
	?>
    <div class="uk-block">
        Some fullwidth custom content.
    </div>
	<?php
}

// Replace Beans loop with a custom 6 posts loop.
beans_modify_action_callback( 'beans_loop_template', 'pp_latest_posts_in_responsive_grid_view' );

function pp_latest_posts_in_responsive_grid_view() {
	// Get the 6 latests posts.
	$posts = get_posts( array( 'posts_per_page' => 6 ) );
	?>
    <div class="uk-container uk-container-large uk-container-center">
        <ul class="uk-grid uk-grid-large uk-grid-width-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-3 uk-grid-match uk-text-center"
            data-uk-grid-margin>
			<?php
			foreach ( $posts as $post ) {
				// Setup the postdata.
				global $post;
				setup_postdata( $post );

				// Display post title and content using Beans fragments.
				?>
                <li>
                    <div class="uk-panel uk-panel-box">
                        <h1><?php beans_post_title(); ?></h1>
                        <p><?php beans_post_content(); ?></p>
                    </div>
                </li>
				<?php
			}
			?>
        </ul>
    </div>
	<?php
}

// Add the pre footer custom static content.
add_action( 'beans_footer_before_markup', 'example_view_pre_footer_content' );

function example_view_pre_footer_content() {
	?>
    <div class="uk-block uk-block-secondary">
    pre footer content
    </div>
	<?php
}

beans_load_document();