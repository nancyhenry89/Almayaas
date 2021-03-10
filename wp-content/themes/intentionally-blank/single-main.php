<?php
/**
 * The Template for displaying all single posts
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
					get_template_part( 'designers', 'designers' );
					
					$post_id = get_the_ID();
					get_post_meta($post_id,  true);
	  
					// Previous/next post navigation.

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>

			<p>Price: $<?php echo get_post_meta( get_the_ID(), 'designers', true ); ?></p>

									<h2 class="nancy">
									
                            <a href="<?php the_permalink(); ?>"><?php get_post_meta($post_id, 'designers', true); ?></a>
                        </h2>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
