<?php /* Template Name: Home Template */ get_header(); ?>

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

					<div class="slider" id="slideshow">
						<div class="col-md-12">
							<img src="<?php echo get_post_meta( get_the_ID(), 'slide1', true ); ?>">
							</img>
						</div>
						<div class="col-md-12">
							<img src="<?php echo get_post_meta( get_the_ID(), 'slide2', true ); ?>">
							</img>
						</div>
						<div class="col-md-12">
							<img src="<?php echo get_post_meta( get_the_ID(), 'slide3', true ); ?>">
							</img>
						</div>
					</div>

					<?php endwhile;

endif;
wp_reset_postdata();
?>

			</div>
<div class="container" id="story">
	<div class="row">
		<div class="col-md-12 center">
			<h2>Our Story</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p class="story-text">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis.
			Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
			</p>
		</div>
	</div>
</div>
<div class="container-fluid" id="about">
	<div class="container" >
		<div class="row">
			<div class="col-md-12 center">
				<h2>About us</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="about-text">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis.
				Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
				</p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid" id="services">
	<div class="container" >
		<div class="row">
			<div class="col-md-12 center">
				<h2>Services</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="s-icon">
				<img src="<?php echo get_template_directory_uri(); ?>/img/s1.png">
				</div>
				<label class="service-label">Dine in </label>
			</div>
			<div class="col-md-3">
				<div class="s-icon">
				<img src="<?php echo get_template_directory_uri(); ?>/img/s2.png">
				</div>
				<label class="service-label">Delivery</label>
			</div>
			<div class="col-md-3">
				<div class="s-icon">
				<img src="<?php echo get_template_directory_uri(); ?>/img/s3.png">
				</div>
				<label class="service-label">Catering</label>
			</div>
			<div class="col-md-3">
				<div class="s-icon">
				<img src="<?php echo get_template_directory_uri(); ?>/img/s4.png">
				</div>
				<label class="service-label">Events</label>
			</div>
		</div>
	</div>
</div>
<div id="gallery" class="container-fluid">
	<div id="food-gallery" class="gal">
		<h3 class="gal-title">Food</h3>
		<div class="gal-cont"><?php if( function_exists('photo_gallery') ) { photo_gallery(1); } ?></div>
	</div>
	<div id="interior" class="gal">
		<h3 class="gal-title">Interior</h3>
		<div class="gal-cont"><?php if( function_exists('photo_gallery') ) { photo_gallery(1); } ?></div>
	</div>
	<div id="exterior" class="gal">
	<h3 class="gal-title">Exterior</h3>
	<div class="gal-cont"><?php if( function_exists('photo_gallery') ) { photo_gallery(1); } ?></div>
	</div>

</div>
<div id="delivery" class="container-fluid">
<div class="container" >
		<div class="row">
			<div class="col-md-12">
				<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/img/delivery.png"></div>
				<a class="delivery-btn" href="#">Click here for delivery</a>
			</div>
		</div>
</div>
</div>

<div id="contact" class="container-fluid">
<div class="container" >
		<div class="row">
		<div class="col-md-12 center">
				<h2>Contact us</h2>
			</div>
			<div class="col-md-12 phone">
				<label>Phone Number</label>
				<div class="number">022243432432</div>
				<div class="number">022243432432</div>
			</div>
			<div class="col-md-12 address">
				<label>Address</label>
				<div>cdskjvndvnd's</div>
				<div>cdskjvndvnd</div>
			</div>
			<div class="col-md-12 social">
				<a class="web"><i class="fa fa-globe"></i></a>
				<a class="insta"><i class="fab fa-instagram"></i></a>
			</div>
			<div class="col-md-12 map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3478.0054147005226!2d47.93899681509871!3d29.340837082143736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf854a7782564b%3A0x145d6a0bdb21fb30!2zRGlldCBDZW50ZXIgfCDYr9in2YrYqiDYs9mG2KrYsQ!5e0!3m2!1sen!2seg!4v1609680259521!5m2!1sen!2seg" width="80%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                           
                                     </div>
		</div>
</div>
</div>

			<?php
$loop = new WP_Query( array( 'post_type' => 'story') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<!--bluebox start-->
			<div class="container">
			<div class="row">
				<div class="blue-box">
				<?php echo get_post_meta( get_the_ID(), 'blueBox', true ); ?>
			</div>
			</div>

			</div>
			<?php endwhile;

endif;
wp_reset_postdata();
?>

			<?php
$loop = new WP_Query( array( 'post_type' => 'home') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="container exp">
			<div class="row">
				<div class="col-md-12">
					<div class="title">+20 years of experience</div>
				</div>
			</div>
			<div class="row exp-details">
				<div class="col-md-6">
					<div class="one-exp">
						<div class="img">
						<img src="<?php echo get_post_meta( get_the_ID(), 'exp1img', true ); ?>">
							</img>
						</div>
						<div>
							<div class="exp-title"><?php echo get_post_meta( get_the_ID(), 'exp1', true ); ?></div>
							<div class="desc-text">
							<?php echo get_post_meta( get_the_ID(), 'exp1dec', true ); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="one-exp">
						<div class="img">
						<img src="<?php echo get_post_meta( get_the_ID(), 'exp2img', true ); ?>">
							</img>
						</div>
						<div>
							<div class="exp-title"><?php echo get_post_meta( get_the_ID(), 'exp2', true ); ?></div>
							<div class="desc-text">
							<?php echo get_post_meta( get_the_ID(), 'exp2dec', true ); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="one-exp">
						<div class="img">
						<img src="<?php echo get_post_meta( get_the_ID(), 'exp3img', true ); ?>">
							</img>
						</div>
						<div>
							<div class="exp-title"><?php echo get_post_meta( get_the_ID(), 'exp3', true ); ?></div>
							<div class="desc-text">
							<?php echo get_post_meta( get_the_ID(), 'exp3dec', true ); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="one-exp">
						<div class="img">
						<img src="<?php echo get_post_meta( get_the_ID(), 'exp4img', true ); ?>">
							</img>
						</div>
						<div>
							<div class="exp-title"><?php echo get_post_meta( get_the_ID(), 'exp4', true ); ?></div>
							<div class="desc-text">
							<?php echo get_post_meta( get_the_ID(), 'exp4dec', true ); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="one-exp">
						<div class="img">
						<img src="<?php echo get_post_meta( get_the_ID(), 'exp5img', true ); ?>">
							</img>
						</div>
						<div>
							<div class="exp-title"><?php echo get_post_meta( get_the_ID(), 'exp5', true ); ?></div>
							<div class="desc-text">
							<?php echo get_post_meta( get_the_ID(), 'exp5dec', true ); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="one-exp">
						<div class="img">
						<img src="<?php echo get_post_meta( get_the_ID(), 'exp6img', true ); ?>">
							</img>
						</div>
						<div>
							<div class="exp-title"><?php echo get_post_meta( get_the_ID(), 'exp6', true ); ?></div>
							<div class="desc-text">
							<?php echo get_post_meta( get_the_ID(), 'exp6dec', true ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row exp-foot">
				and more...
			</div>
			</div>

			<!--bluebox end-->


		</div>
		<div class="exp-brands container-fluid">
		<div class="container exp">

<div class="row exp-details">
	<div class="col-md-6">
		<div class="one-exp">
			<div class="img">
			<img src="<?php echo get_post_meta( get_the_ID(), 'brand1img', true ); ?>"></img>
			</div>
			<div>
				<div class="desc-text">
				<?php echo get_post_meta( get_the_ID(), 'brand1', true ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="one-exp">
			<div class="img">
			<img src="<?php echo get_post_meta( get_the_ID(), 'brand2img', true ); ?>"></img>
			</div>
			<div>
				<div class="desc-text">
				<?php echo get_post_meta( get_the_ID(), 'brand2', true ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="one-exp">
			<div class="img">
			<img src="<?php echo get_post_meta( get_the_ID(), 'brand3img', true ); ?>"></img>
			</div>
			<div>
				<div class="desc-text">
				<?php echo get_post_meta( get_the_ID(), 'brand3', true ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="one-exp">
			<div class="img">
			<img src="<?php echo get_post_meta( get_the_ID(), 'brand4img', true ); ?>"></img>
			</div>
			<div>
				<div class="desc-text">
				<?php echo get_post_meta( get_the_ID(), 'brand4', true ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="one-exp">
			<div class="img">
				<img src="<?php echo get_post_meta( get_the_ID(), 'brand5img', true ); ?>"></img>
			</div>
			<div>
				<div class="desc-text">
				<?php echo get_post_meta( get_the_ID(), 'brand5', true ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="one-exp special">
			<p class="exp-title">and new concepts to be LAUNCHED soon</p>
		</div>
	</div>
</div>
</div>
		</div>
		<!-- #content -->
	</div>
	<!-- #primary -->
</div>
<!-- #main-content -->

<?php endwhile;

endif;
wp_reset_postdata();
?>
<?php
get_footer();