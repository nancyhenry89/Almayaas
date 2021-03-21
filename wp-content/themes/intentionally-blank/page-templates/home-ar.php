<?php /* Template Name: Home-ar Template */ get_header('arabic'); ?>

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
			<?php
$loop = new WP_Query( array( 'post_type' => 'story') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>
<div class="container" id="story">
	<div class="row">
		<div class="col-md-12 center">
			<h2>قصتنا</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p class="story-text">
			<?php echo get_post_meta( get_the_ID(), 'story_text_box_ar', true ); ?>
			</p>
		</div>
	</div>
</div>

<div class="container-fluid" id="about" style="background-image: url('<?php echo get_post_meta( get_the_ID(), 'aboutImg', true ); ?>');">
	<div class="container" >
		<div class="row">
			<div class="col-md-12 center">
				<h2>عنا</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="about-text">
				<?php echo get_post_meta( get_the_ID(), 'about_text_box_ar', true ); ?>
				</p>
			</div>
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
<div class="container-fluid" id="services">
	<div class="container" >
		<div class="row">
			<div class="col-md-12 center">
				<h2>خدماتنا</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="s-icon">
				<img src="<?php echo get_post_meta( get_the_ID(), 'brand1img', true ); ?>">
				</div>
				<label class="service-label"><?php echo get_post_meta( get_the_ID(), 'brand1ar', true ); ?> </label>
			</div>
			<div class="col-md-3">
				<div class="s-icon">
				<img src="<?php echo get_post_meta( get_the_ID(), 'brand2img', true ); ?>">
				</div>
				<label class="service-label"><?php echo get_post_meta( get_the_ID(), 'brand2ar', true ); ?> </label>
			</div>
			<div class="col-md-3">
				<div class="s-icon">
				<img src="<?php echo get_post_meta( get_the_ID(), 'brand3img', true ); ?>">
				</div>
				<label class="service-label"><?php echo get_post_meta( get_the_ID(), 'brand3ar', true ); ?> </label>
			</div>
			<div class="col-md-3">
				<div class="s-icon">
				<img src="<?php echo get_post_meta( get_the_ID(), 'brand4img', true ); ?>">
				</div>
				<label class="service-label"><?php echo get_post_meta( get_the_ID(), 'brand4ar', true ); ?> </label>
			</div>
		</div>
	</div>
</div>

<?php endwhile;

endif;
wp_reset_postdata();
?>
<div id="gallery" class="container-fluid">

	<div id="food-gallery" class="gal">
		<h3 class="gal-title">الطعام</h3>
		<div class="gal-cont"><?php if( function_exists('photo_gallery') ) { photo_gallery(1); } ?></div>
	</div>
	<div id="interior" class="gal">
		<h3 class="gal-title">الداخل</h3>
		<div class="gal-cont"><?php if( function_exists('photo_gallery') ) { photo_gallery(2); } ?></div>
	</div>
	<div id="exterior" class="gal">
	<h3 class="gal-title">الخارج</h3>
	<div class="gal-cont"><?php if( function_exists('photo_gallery') ) { photo_gallery(3); } ?></div>
	</div>

</div>
<div id="delivery" class="container-fluid">
<div class="container" >
		<div class="row">
			<div class="col-md-12">
				<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/img/delivery.png"></div>
				<a class="delivery-btn" href="http://orderalmayass.com" target="_blank">اضغط هنا للتوصيل</a>
			</div>
		</div>
</div>
</div>
<?php
$loop = new WP_Query( array( 'post_type' => 'contact') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>
<div id="contact" class="container-fluid">
<div class="container" >
		<div class="row">
		<div class="col-md-12 center">
				<h2>اتصل بنا</h2>
			</div>
			<div class="col-md-12 phone">
				<label>التليفون</label>
				<div class="number"><?php echo get_post_meta( get_the_ID(), 'phone', true ); ?> </div>
			</div>
			<div class="col-md-12 address">
				<label>العنوان</label>
				<div><?php echo get_post_meta( get_the_ID(), 'addar', true ); ?> </div>
			</div>
			<div class="col-md-12 social">
				<a class="insta" href="https://www.instagram.com/almayasskw/" target="_blank"><i class="fab fa-instagram"></i></a>
			</div>
			<div class="col-md-12 map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3478.0054147005226!2d47.93899681509871!3d29.340837082143736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf854a7782564b%3A0x145d6a0bdb21fb30!2zRGlldCBDZW50ZXIgfCDYr9in2YrYqiDYs9mG2KrYsQ!5e0!3m2!1sen!2seg!4v1609680259521!5m2!1sen!2seg" width="80%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                           
                                     </div>
		</div>
</div>
</div>
<?php endwhile;

endif;
wp_reset_postdata();
?>
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
get_footer('ar');