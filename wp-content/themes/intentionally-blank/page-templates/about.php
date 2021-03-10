<?php /* Template Name: about Template */ get_header(); ?>

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

<div class="banner" id="aboutBanner">
							<img src="<?php echo get_post_meta( get_the_ID(), 'about1', true ); ?>">
							</img>

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


			<!--our story start-->

			<div id="story" class="container-fluid ">
				<div class="container">

				<div class="row">
					<div class="story">
					<div class="col-md-4">
						<div class="title">OUR STORY</div>
						<div class="co-img"><img src="<?php echo get_post_meta( get_the_ID(), 'coImg', true ); ?>"></div>
						<label>Faisal Al-Mashaan</label>
						<label>Founder & General Manager</label>
					</div>
					<div class="col-md-8">
						<div class="co-word">
						<?php
											$content = get_post_meta(get_the_ID(), 'story_text_box' , true );
												$content = htmlspecialchars_decode($content);
												$content = wpautop( $content );
												echo $content;
											?>
						
						</div>
					</div>
				</div>

				</div>
				</div>
			</div>

			<!--our story end-->
			<!--about start-->
 
				<div id="about" class="container-fluid">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="sec-head">ABOUT US</div>
								<div class="a-text">
								<?php
											$content1 = get_post_meta(get_the_ID(), 'about_text_box' , true );
												$content1 = htmlspecialchars_decode($content1);
												$content1 = wpautop( $content1);
												echo $content1;
											?>
								</div>
							</div>
						</div>
					</div>
				</div>

			<!--about end-->
			<!--our values start-->
			<div id="values" class="container-fluid">
				<div class="col-md-7 col-sm-3">
					<div class="val-img"><img src="<?php echo get_post_meta( get_the_ID(), 'valImg', true ); ?>"/></div>
				</div>
				<div class="col-md-5 col-sm-9">
				<div class="sec-head left">OUR VALUES</div>
				<div class="v-text">
				<?php
											$content2 = get_post_meta(get_the_ID(), 'values_text_box' , true );
												$content2 = htmlspecialchars_decode($content2);
												$content2 = wpautop( $content2);
												echo $content2;
											?>
								</div>
				</div>
			</div>
			<!--our values end-->
			<!--our cap start-->
			<div id="cap" class="container-fluid"  style="background-image: url('<?php echo get_post_meta( get_the_ID(), 'capImg', true ); ?>');">
				<div class="container">
					<div class="col-md-12">
						<div class="cap">
							<h3 class="title">CAPABILITIES</h3>
							<div class="c-text">
							<?php
											$content3 = get_post_meta(get_the_ID(), 'cap_text_box' , true );
												$content3 = htmlspecialchars_decode($content3);
												$content3 = wpautop( $content3);
												echo $content3;
											?>
</div>
						</div>
					</div>
				</div>
			</div>
			<!--our cap end-->
			<!--our team start-->
			<div id="team" class="container-fluid">
			<div class="col-md-5 col-sm-9">
				<div class="sec-head left">OUR TEAM</div>
				<div class="t-text">
				<?php
											$content4 = get_post_meta(get_the_ID(), 'team_text_box' , true );
												$content4 = htmlspecialchars_decode($content4);
												$content4 = wpautop( $content4);
												echo $content4;
											?>
								</div>
				</div>
				<div class="col-md-7 col-sm-3">
					<div class="team-img"><img src="<?php echo get_post_meta( get_the_ID(), 'teamImg', true ); ?>"/></div>
				</div>

			<div>
			<!--our team end-->

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