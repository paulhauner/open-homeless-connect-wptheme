<?php
/**
 * Custom template tags for openhc
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package openhc
 * @since openhc 1.0
 */

if ( ! function_exists( 'openhc_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since openhc 1.0
 */
function openhc_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'openhc' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'openhc' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'openhc' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;

if ( ! function_exists( 'openhc_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * @since openhc 1.0
 */
function openhc_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', esc_html__( 'Featured', 'openhc' ) );
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', esc_html_x( 'Format', 'Used before post format.', 'openhc' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
			esc_html_x( 'Posted on', 'Used before publish date.', 'openhc' ),
			esc_url( get_permalink() ),
			$time_string
		);
	}

	if ( 'post' == get_post_type() ) {
		if ( is_singular() || is_multi_author() ) {
			printf( '<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',
				esc_html_x( 'Author', 'Used before post author name.', 'openhc' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		$categories_list = get_the_category_list( esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'openhc' ) );
		if ( $categories_list && openhc_categorized_blog() ) {
			printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				esc_html_x( 'Categories', 'Used before category names.', 'openhc' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'openhc' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				esc_html_x( 'Tags', 'Used before tag names.', 'openhc' ),
				$tags_list
			);
		}
	}

	if ( is_attachment() && wp_attachment_is_image() ) {
		// Retrieve attachment metadata.
		$metadata = wp_get_attachment_metadata();

		printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
			esc_html_x( 'Full size', 'Used before full size attachment link.', 'openhc' ),
			esc_url( wp_get_attachment_url() ),
			$metadata['width'],
			$metadata['height']
		);
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'openhc' ), esc_html__( '1 Comment', 'openhc' ), esc_html__( '% Comments', 'openhc' ) );
		echo '</span>';
	}
}
endif;

/**
 * Determine whether blog/site has more than one category.
 *
 * @since openhc 1.0
 *
 * @return bool True of there is more than one category, false otherwise.
 */
function openhc_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'openhc_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'	 => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'	 => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'openhc_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so openhc_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so openhc_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in {@see openhc_categorized_blog()}.
 *
 * @since openhc 1.0
 */
function openhc_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'openhc_categories' );
}
add_action( 'edit_category', 'openhc_category_transient_flusher' );
add_action( 'save_post',	 'openhc_category_transient_flusher' );

if ( ! function_exists( 'openhc_post_thumbnail' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * @since openhc 1.0
 */
function openhc_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
		?>
	</a>

	<?php endif; // End is_singular()
}
endif;

if ( ! function_exists( 'openhc_get_link_url' ) ) :
/**
 * Return the post URL.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since openhc 1.0
 *
 * @see get_url_in_content()
 *
 * @return string The Link format URL.
 */
function openhc_get_link_url() {
	$has_url = get_url_in_content( get_the_content() );

	return $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;

if ( ! function_exists( 'openhc_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 * @since openhc 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function openhc_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( esc_html__( 'Continue reading %s', 'openhc' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'openhc_excerpt_more' );
endif;
/**
 * Front Page - Featured Page One
 */
function openhc_featured_page_one() {
	$featured_page_1 = esc_attr( get_theme_mod( 'openhc_featured_page_one', '0' ) );
	if ( 0 == $featured_page_1 ) {
		return;
	}
?>
<div class="block-one">
	<div class="hfeed site">
		<div class="content site-content">
			<div class="content-area">
				<div class="main site-main" role="main">
					<?php for ( $page_number = 1; $page_number <= 1; $page_number++ ) : ?>
						<?php if ( 0 != ${'featured_page_' . $page_number} ) : // Check if a featured page has been set in the customizer ?>
								<?php
									// Create new argument using the page ID of the page set in the customizer
									$featured_page_args = array(
										'page_id' => ${'featured_page_' . $page_number},
									);
									// Create a new WP_Query using the argument previously created
									$featured_page_query = new WP_Query( $featured_page_args );
								?>
								<?php while ( $featured_page_query->have_posts() ) : $featured_page_query->the_post(); ?>
									<?php get_template_part( 'content', 'front-firstblock' ); ?>
								<?php
									endwhile;
									wp_reset_postdata();
								?>
						<?php endif; ?>
					<?php endfor; ?>
				</div><!-- .site-main -->
			</div><!-- .content-area -->
		</div><!-- .site-content -->
	</div><!-- .site -->
</div><!-- .block-one -->
<?php
}
/**
 * Front Page - Featured Page Two
 */
function openhc_featured_page_two() {
	$featured_page_1 = esc_attr( get_theme_mod( 'openhc_featured_page_two', '0' ) );
	if ( 0 == $featured_page_1 ) {
		return;
	}
?>
<div class="second-block frontpage-dual-split-block">
	<?php for ( $page_number = 1; $page_number <= 1; $page_number++ ) : ?>
		<?php if ( 0 != ${'featured_page_' . $page_number} ) : // Check if a featured page has been set in the customizer ?>
				<?php
					// Create new argument using the page ID of the page set in the customizer
					$featured_page_args = array(
						'page_id' => ${'featured_page_' . $page_number},
					);
					// Create a new WP_Query using the argument previously created
					$featured_page_query = new WP_Query( $featured_page_args );
				?>
				<?php while ( $featured_page_query->have_posts() ) : $featured_page_query->the_post(); ?>
					<?php get_template_part( 'content', 'front-secondblock' ); ?>
				<?php
					endwhile;
					wp_reset_postdata();
				?>
		<?php endif; ?>
	<?php endfor; ?>
</div><!-- .second-block -->
<?php
}
/**
 * Front Page - Featured Page Three
 */
function openhc_featured_page_three() {
	$featured_page_1 = esc_attr( get_theme_mod( 'openhc_featured_page_three', '0' ) );
	if ( 0 == $featured_page_1 ) {
		return;
	}
?>
<div class="second-block frontpage-dual-split-block">
	<?php for ( $page_number = 1; $page_number <= 1; $page_number++ ) : ?>
		<?php if ( 0 != ${'featured_page_' . $page_number} ) : // Check if a featured page has been set in the customizer ?>
				<?php
					// Create new argument using the page ID of the page set in the customizer
					$featured_page_args = array(
						'page_id' => ${'featured_page_' . $page_number},
					);
					// Create a new WP_Query using the argument previously created
					$featured_page_query = new WP_Query( $featured_page_args );
				?>
				<?php while ( $featured_page_query->have_posts() ) : $featured_page_query->the_post(); ?>
					<?php get_template_part( 'content', 'front-thirdblock' ); ?>
				<?php
					endwhile;
					wp_reset_postdata();
				?>
		<?php endif; ?>
	<?php endfor; ?>
</div><!-- .second-block -->
<?php
}
/**
 * Event Page - Featured Page One
 */
function openhc_event_page_one() {
	$featured_page_1 = esc_attr( get_theme_mod( 'openhc_event_page_one', '0' ) );
	if ( 0 == $featured_page_1 ) {
		return;
	}
?>
<div class="second-block frontpage-dual-split-block ">
	<?php for ( $page_number = 1; $page_number <= 1; $page_number++ ) : ?>
		<?php if ( 0 != ${'featured_page_' . $page_number} ) : // Check if a featured page has been set in the customizer ?>
				<?php
					// Create new argument using the page ID of the page set in the customizer
					$featured_page_args = array(
						'page_id' => ${'featured_page_' . $page_number},
					);
					// Create a new WP_Query using the argument previously created
					$featured_page_query = new WP_Query( $featured_page_args );
				?>
				<?php while ( $featured_page_query->have_posts() ) : $featured_page_query->the_post(); ?>
					<?php get_template_part( 'content', 'event-firstblock' ); ?>
				<?php
					endwhile;
					wp_reset_postdata();
				?>
		<?php endif; ?>
	<?php endfor; ?>
</div><!-- .second-block -->
<?php
}
/**
 * Event Page - Featured Page Two
 */
function openhc_event_page_two() {
	$featured_page_1 = esc_attr( get_theme_mod( 'openhc_event_page_two', '0' ) );
	if ( 0 == $featured_page_1 ) {
		return;
	}
?>
<div class="second-block frontpage-dual-split-block">
	<?php for ( $page_number = 1; $page_number <= 1; $page_number++ ) : ?>
		<?php if ( 0 != ${'featured_page_' . $page_number} ) : // Check if a featured page has been set in the customizer ?>
				<?php
					// Create new argument using the page ID of the page set in the customizer
					$featured_page_args = array(
						'page_id' => ${'featured_page_' . $page_number},
					);
					// Create a new WP_Query using the argument previously created
					$featured_page_query = new WP_Query( $featured_page_args );
				?>
				<?php while ( $featured_page_query->have_posts() ) : $featured_page_query->the_post(); ?>
					<?php get_template_part( 'content', 'event-secondblock' ); ?>
				<?php
					endwhile;
					wp_reset_postdata();
				?>
		<?php endif; ?>
	<?php endfor; ?>
</div><!-- .second-block -->
<?php
}
/**
 * Event Page - Featured Page Three
 */
function openhc_event_page_three() {
	$featured_page_1 = esc_attr( get_theme_mod( 'openhc_event_page_three', '0' ) );
	if ( 0 == $featured_page_1 ) {
		return;
	}
?>
<div class="second-block frontpage-dual-split-block">
	<?php for ( $page_number = 1; $page_number <= 1; $page_number++ ) : ?>
		<?php if ( 0 != ${'featured_page_' . $page_number} ) : // Check if a featured page has been set in the customizer ?>
				<?php
					// Create new argument using the page ID of the page set in the customizer
					$featured_page_args = array(
						'page_id' => ${'featured_page_' . $page_number},
					);
					// Create a new WP_Query using the argument previously created
					$featured_page_query = new WP_Query( $featured_page_args );
				?>
				<?php while ( $featured_page_query->have_posts() ) : $featured_page_query->the_post(); ?>
					<?php get_template_part( 'content', 'front-thirdblock' ); ?>
				<?php
					endwhile;
					wp_reset_postdata();
				?>
		<?php endif; ?>
	<?php endfor; ?>
</div><!-- .second-block -->
<?php
}
/**
 * About Page - Featured Page One
 */
function openhc_featured_aboutpage_one() {
	$featured_page_1 = esc_attr( get_theme_mod( 'openhc_featured_aboutpage_one', '0' ) );
	if ( 0 == $featured_page_1 ) {
		return;
	}
?>
<div class="block-one">
	<div class="hfeed site">
		<div class="content site-content">
			<div class="content-area">
				<div class="main site-main" role="main">
					<?php for ( $page_number = 1; $page_number <= 1; $page_number++ ) : ?>
						<?php if ( 0 != ${'featured_page_' . $page_number} ) : // Check if a featured page has been set in the customizer ?>
								<?php
									// Create new argument using the page ID of the page set in the customizer
									$featured_page_args = array(
										'page_id' => ${'featured_page_' . $page_number},
									);
									// Create a new WP_Query using the argument previously created
									$featured_page_query = new WP_Query( $featured_page_args );
								?>
								<?php while ( $featured_page_query->have_posts() ) : $featured_page_query->the_post(); ?>
									<?php get_template_part( 'content', 'about-firstblock' ); ?>
								<?php
									endwhile;
									wp_reset_postdata();
								?>
						<?php endif; ?>
					<?php endfor; ?>
				</div><!-- .site-main -->
			</div><!-- .content-area -->
		</div><!-- .site-content -->
	</div><!-- .site -->
</div><!-- .block-one -->
<?php
}
/**
 * About Page - Featured Page Two
 */
function openhc_featured_aboutpage_two() {
	$featured_page_1 = esc_attr( get_theme_mod( 'openhc_featured_aboutpage_two', '0' ) );
	if ( 0 == $featured_page_1 ) {
		return;
	}
?>
<section class="info">
	<?php for ( $page_number = 1; $page_number <= 1; $page_number++ ) : ?>
		<?php if ( 0 != ${'featured_page_' . $page_number} ) : // Check if a featured page has been set in the customizer ?>
				<?php
					// Create new argument using the page ID of the page set in the customizer
					$featured_page_args = array(
						'page_id' => ${'featured_page_' . $page_number},
					);
					// Create a new WP_Query using the argument previously created
					$featured_page_query = new WP_Query( $featured_page_args );
				?>
				<?php while ( $featured_page_query->have_posts() ) : $featured_page_query->the_post(); ?>
					<?php get_template_part( 'content', 'about-secondblock' ); ?>
				<?php
					endwhile;
					wp_reset_postdata();
				?>
		<?php endif; ?>
	<?php endfor; ?>
</section><!-- .second-block -->
<?php
}