<?php
/**
 * The footer sidebar widget areas
 *
 * @package openhc
 * @since openhc 1.0
 */
 ?>
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div class="clear widget-area optional-widget-area footer-widget-area" role="complementary">
			<div class="<?php openhc_widget_counter( 'sidebar-2' ); ?>">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		</div>
	<?php endif; ?>	