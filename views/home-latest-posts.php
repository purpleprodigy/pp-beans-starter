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
					<?php beans_post_title(); ?>
					<?php beans_post_content(); ?>
                </div>
            </li>
			<?php
		}
		?>
    </ul>
</div>
