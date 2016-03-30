<?php
/**
 * The sidebar containing the recent posts widget
 *
 * @package openhc
 * @since openhc 1.0
 */
 ?>

	<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
		<div class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-7' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>