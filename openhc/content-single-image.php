<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
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

	

</article><!-- #post-## -->