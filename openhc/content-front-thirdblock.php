<?php
/**
 * The template used for displaying child page content
 *
 * @package openhc
 * @since openhc 1.0
 */
?>


	<div class="entry-content customized-background-color-primary">
		<?php if ( has_post_thumbnail() ): ?>
		<div class="small-section">
		<?php
		// Post thumbnail.
		openhc_post_thumbnail();
		?>
		<?php the_content(); ?>
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
		</div>
		<div class="big-section lastcolumn">
			<?php
				$child_pages = new WP_Query( array(
					'post_type'      => 'page',
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
					'post_parent'    => $post->ID,
					'posts_per_page' => 999,
					'no_found_rows'  => true,
				) );
				while ( $child_pages->have_posts() ) : $child_pages->the_post();
					 get_template_part( 'content', 'grid-front-secondblock' );
				endwhile;
				wp_reset_postdata();
			?>
		</div>
		<?php elseif($post->post_content != "") : ?>
		<div class="small-section">
      <div class="entry-content">
        <div class="content-right-block">
          <?php
          // Post thumbnail.
          openhc_post_thumbnail();
          ?>
          <?php the_content(); ?>
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
        </div>
      </div>
		</div>
		<div class="big-section lastcolumn">
			<?php
				$child_pages = new WP_Query( array(
					'post_type'      => 'page',
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
					'post_parent'    => $post->ID,
					'posts_per_page' => 999,
					'no_found_rows'  => true,
				) );
				while ( $child_pages->have_posts() ) : $child_pages->the_post();
					 get_template_part( 'content', 'grid-front-secondblock' );
				endwhile;
				wp_reset_postdata();
			?>
		</div>
		<?php else : ?>
		<?php
			$child_pages = new WP_Query( array(
				'post_type'      => 'page',
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'post_parent'    => $post->ID,
				'posts_per_page' => 999,
				'no_found_rows'  => true,
			) );
			while ( $child_pages->have_posts() ) : $child_pages->the_post();
				 get_template_part( 'content', 'grid-front-secondblock' );
			endwhile;
			wp_reset_postdata();
		?>
		<?php endif; ?>
	</div><!-- .entry-content -->
