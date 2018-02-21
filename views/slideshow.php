<div class="uk-slidenav-position uk-margin-large-bottom"
     data-uk-slideshow="{animation:'scroll',autoplay:'true'}">
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
                            <a class="uk-button uk-button-primary" href="<?php the_permalink(); ?>">Read More</a>
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
