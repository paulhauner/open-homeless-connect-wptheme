<?php
/**
 * The template used for displaying child page content
 *
 * @package openhc
 * @since openhc 1.0
 */
?>

<div class="fourcolumn clearfix">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
			// Post thumbnail.
			openhc_post_thumbnail();
		?>
		<div class="entry-content">
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<hr class="short">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
				wp_kses( __( 'Continue reading %s', 'openhc' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>
			<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'openhc' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'openhc' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
</div>