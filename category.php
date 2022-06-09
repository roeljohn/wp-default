<?php
/**
 * Rendering category archive index pages uses the following path in WordPress:

 * category-{slug}.php – If the category’s slug is news, WordPress will look for category-news.php.
 * category-{id}.php – If the category’s ID is 6, WordPress will look for category-6.php.
 * category.php
 * archive.php
 * index.php
 */

get_header();

if ( have_posts() ) {
	?>
			<?php
the_archive_title( '<h1 class="page-title">This is category.php ', '</h1>' );
			?>

	<?php
	while ( have_posts() ) {
		the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content/content-excerpt', get_post_format() );
	} // End the loop.

	// Previous/next page navigation.
	//twenty_twenty_one_the_posts_navigation();

	// If no content, include the "No posts found" template.
} else {
	get_template_part( 'template-parts/content/content-none' );
}

get_footer();
