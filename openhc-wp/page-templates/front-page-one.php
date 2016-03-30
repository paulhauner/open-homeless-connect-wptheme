<?php
/**
 * Template Name: Front Page with Slider
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package openhc
 * @since openhc 1.0
 */

get_header(); ?>
	<div class="intro">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'front-page-one' );

		// End the loop.
		endwhile;
		?>
	</div><!-- .intro -->
	<?php openhc_featured_page_one(); ?>
	<?php openhc_featured_page_two(); ?>
	<?php openhc_featured_page_three(); ?>
	<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
	 <div class="block-four">
		<div class="columns clear">
			<?php get_sidebar( 'recentposts' ); ?>
		</div><!-- .child-pages -->
	</div><!-- .block-four -->
	<?php endif; ?>
<?php get_footer(); ?>