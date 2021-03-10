<?php /* Template Name: careers ar Template */ get_header('arabic');?>

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
							<img src="<?php echo get_post_meta( get_the_ID(), 'slide1ar', true ); ?>">
							</img>
						</div>
						<div class="col-md-12">
							<img src="<?php echo get_post_meta( get_the_ID(), 'slide2ar', true ); ?>">
							</img>
						</div>
						<div class="col-md-12">
							<img src="<?php echo get_post_meta( get_the_ID(), 'slide3ar', true ); ?>">
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

			<!--bluebox start-->
			<div class="container">
			<div class="row">
				<div class="blue-box">
				<?php echo get_post_meta( get_the_ID(), 'blueBoxAR', true ); ?>
			</div>
			</div>
			</div>

			<!--bluebox end-->
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
					<div class="title">خبرة اكثر من ٢٠ سنة</div>
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
							<div class="exp-title"><?php echo get_post_meta( get_the_ID(), 'exp1ar', true ); ?></div>
							<div class="desc-text">
							<?php echo get_post_meta( get_the_ID(), 'exp1decar', true ); ?>
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
							<div class="exp-title"><?php echo get_post_meta( get_the_ID(), 'exp2ar', true ); ?></div>
							<div class="desc-text">
							<?php echo get_post_meta( get_the_ID(), 'exp2decar', true ); ?>
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
							<div class="exp-title"><?php echo get_post_meta( get_the_ID(), 'exp3ar', true ); ?></div>
							<div class="desc-text">
							<?php echo get_post_meta( get_the_ID(), 'exp3decar', true ); ?>
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
							<div class="exp-title"><?php echo get_post_meta( get_the_ID(), 'exp4ar', true ); ?></div>
							<div class="desc-text">
							<?php echo get_post_meta( get_the_ID(), 'exp4decar', true ); ?>
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
							<div class="exp-title"><?php echo get_post_meta( get_the_ID(), 'exp5ar', true ); ?></div>
							<div class="desc-text">
							<?php echo get_post_meta( get_the_ID(), 'exp5decar', true ); ?>
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
							<div class="exp-title"><?php echo get_post_meta( get_the_ID(), 'exp6ar', true ); ?></div>
							<div class="desc-text">
							<?php echo get_post_meta( get_the_ID(), 'exp6decar', true ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row exp-foot">
				<div>
			والمزيد..
			</div>
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
				<?php echo get_post_meta( get_the_ID(), 'brand1ar', true ); ?>
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
				<?php echo get_post_meta( get_the_ID(), 'brand2ar', true ); ?>
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
				<?php echo get_post_meta( get_the_ID(), 'brand3ar', true ); ?>
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
				<?php echo get_post_meta( get_the_ID(), 'brand4ar', true ); ?>
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
				<?php echo get_post_meta( get_the_ID(), 'brand5ar', true ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="one-exp special">
			<p class="exp-title">ومشاريع جديدة سوف تُطلق قريباً</p>
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
get_footer('ar');