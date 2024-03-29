<?php
/** 
 * The single post template file is used to render a single post. WordPress uses the following path:

 * single-{post-type}-{slug}.php – (Since 4.4) First, WordPress looks for a template for the specific post. For example, if post type is product and the post slug is dmc-12, WordPress would look for single-product-dmc-12.php.
 * single-{post-type}.php – If the post type is product, WordPress would look for single-product.php.
 * single.php – WordPress then falls back to single.php.
 * singular.php – Then it falls back to singular.php.
 * index.php – Finally, as mentioned above, WordPress ultimately falls back to index.php.
*/
get_header();


while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content' );
	
    wp_list_categories('title_li=');
    wp_tag_cloud();
    wp_get_archives( array( 'type' => 'daily', 'limit' => 14, 'show_post_count' => 'true' ) );
	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
			)
		);
	}

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

endwhile; 

get_sidebar();
get_footer();
