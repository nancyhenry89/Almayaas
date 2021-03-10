<?php /* Template Name: about ar Template */ get_header('arabic');?>

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
							<img src="<?php echo get_post_meta( get_the_ID(), 'about1ar', true ); ?>">
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
						<div class="title">قصتنا</div>
						<div class="co-img"><img src="<?php echo get_post_meta( get_the_ID(), 'coImg', true ); ?>"></div>
						<label>فيصل المشعان</label>
						<label>المؤسس والمدير العام</label>
					</div>
					<div class="col-md-8">
						<div class="co-word">
						<?php
											$contentar = get_post_meta(get_the_ID(), 'story_text_box_ar' , true );
												$contentar = htmlspecialchars_decode($contentar);
												$contentar = wpautop( $contentar );
												echo $contentar;
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
								<div class="sec-head">عن سما</div>
								<div class="a-text">
								<?php
											$content1ar = get_post_meta(get_the_ID(), 'about_text_box_ar' , true );
												$content1ar = htmlspecialchars_decode($content1ar);
												$content1ar = wpautop( $content1ar);
												echo $content1ar;
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
				<div class="sec-head left">قيمنا</div>
				<div class="v-text">
				<?php
											$content2ar = get_post_meta(get_the_ID(), 'values_text_box_ar' , true );
												$content2ar = htmlspecialchars_decode($content2ar);
												$content2ar = wpautop( $content2ar);
												echo $content2ar;
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
							<h3 class="title">قدراتنا</h3>
							<div class="c-text">
							<?php
											$content3ar = get_post_meta(get_the_ID(), 'cap_text_box_ar' , true );
												$content3ar = htmlspecialchars_decode($content3ar);
												$content3ar = wpautop( $content3ar);
												echo $content3ar;
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
				<div class="sec-head left">فريقنا</div>
				<div class="t-text">
				<?php
											$content4ar = get_post_meta(get_the_ID(), 'team_text_box_ar' , true );
												$content4ar = htmlspecialchars_decode($content4ar);
												$content4ar = wpautop( $content4ar);
												echo $content4ar;
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
get_footer('ar');