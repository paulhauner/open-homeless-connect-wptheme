<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package openhc
 * @since openhc 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		openhc_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<?php if(!get_theme_mod('openhc_post_footer')) : ?>
	<footer class="entry-footer">
		<?php openhc_entry_meta(); ?>
		<?php edit_post_link( esc_html__( 'Edit', 'openhc' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->