<?php
/**
 * The sidebar containing the main widget area
 *
 * @package openhc
 * @since openhc 1.0
 */
 ?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>
