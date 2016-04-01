<?php
/**
 * The template used for displaying page content
 *
 * @package openhc
 * @since openhc 1.0
 */
?>


	<div class="entry-content">
		<?php
			// Post thumbnail.
			openhc_post_thumbnail();
			?>
		<div class="content-right-block">
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
		</div><!-- .content-right-block -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->