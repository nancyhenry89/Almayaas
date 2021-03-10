<?php /* Template Name: Brands ar Template */ get_header('arabic'); ?>

    <div id="main-content" class="main-content">

<?php
//if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
// Include the featured content template.
//get_template_part( 'featured-content' );

?>    
    <div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<div id="mainSec" class="">
				<?php
$loop = new WP_Query( array( 'post_type' => 'main') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>

<div class="banner" id="brandsBanner">
							<img src="<?php echo get_post_meta( get_the_ID(), 'brandsBannerar', true ); ?>">
							</img>

					</div>

					<?php endwhile;

endif;
wp_reset_postdata();
?>

			</div>
    <!--brands start-->

			<div id="brands" class="container-fluid">

			   
					<?php
$loop = new WP_Query( array( 'post_type' => 'brands') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>

<div class="brand" id="<?php echo get_post_meta( get_the_ID(), 'brandOrder', true ); ?>" style="order:<?php echo get_post_meta( get_the_ID(), 'brandOrder', true ); ?>">
				<div class="background">
					<img src="<?php echo get_post_meta( get_the_ID(), 'background', true ); ?>"/>
				</div>
				<div class="details">
					<div class="b-logo"><img src="<?php echo get_post_meta( get_the_ID(), 'logo', true ); ?>"/></div>
					<div class="b-logoc"><img src="<?php echo get_post_meta( get_the_ID(), 'logoc', true ); ?>"/></div>
					<div class="b-desc"><?php echo get_post_meta( get_the_ID(), 'brandTextar', true ); ?></div>

				</div>
				<a target="_blank" class="b-link" href="<?php echo get_post_meta( get_the_ID(), 'web', true ); ?>"><i class="fa fa-globe" aria-hidden="true"></i></a>
					<a target="_blank" class="b-insta" href="<?php echo get_post_meta( get_the_ID(), 'instaLink', true ); ?>"><i class="fab fa-instagram"></i></a>
						</div>

						<?php endwhile;

endif;
wp_reset_postdata();
?>
				</div>
			</div>
			</div>
			</div>
			<!--brands end-->

			<?php
get_footer('ar');