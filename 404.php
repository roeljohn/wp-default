<?php
/**
 * Likewise, 404 template files are called in this order:
 *
 * 404.php
 * index.php
 */

get_header();
?>

<?php esc_html_e( 'Error 404', 'wp-default' ); ?></h1>

<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentytwentyone' ); ?></p>
<?php get_search_form(); ?>

<?php
get_footer();
