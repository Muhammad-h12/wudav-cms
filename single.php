<!-- This single.php powers all the blog posts -->

<?php 


if ( have_posts() ) : 

while ( have_posts() ) : 

the_post(); 

    the_title();
    the_content();
?>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>