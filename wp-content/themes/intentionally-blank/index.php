<?php /* Template Name: Home Template */ get_header(); ?>

    <div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div id="mainSec" class="container">
				<?php
$loop = new WP_Query( array( 'post_type' => 'main') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<div class="video">
						<div class="col-md-12">
							<video autoplay loop poster="<?php echo get_post_meta( get_the_ID(), 'vidThumb', true ); ?>">
							<source src="<?php echo get_post_meta( get_the_ID(), 'vidLink', true ); ?>" type="video/mp4">
</video>
						</div>
					</div>
					<div class="numbers">
						<div class="col-md-4 number-turn">
							<div class="number">
								<?php echo get_post_meta( get_the_ID(), 'roi', true ); ?>
							</div>
							<label>ROI</label>
						</div>
						<div class="col-md-4">
							<div class="number">
								<?php echo get_post_meta( get_the_ID(), 'countries', true ); ?>
							</div>

							<label>Countries</label>
						</div>
						<div class="col-md-4">
							<div class="number">
								<?php echo get_post_meta( get_the_ID(), 'epc', true ); ?>
							</div>

							<label>EPC</label>
						</div>
					</div>
					<button class="mobile btn btn-primary main-btn">Lets Get Started</button>
					<?php endwhile;

endif;
wp_reset_postdata();
?>

			</div>

			<!--advertisers start-->

			<div id="advertisers" class="container-fluid double-sec sec">

			   
					<?php
$loop = new WP_Query( array( 'post_type' => 'advertisers') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="advImg">
					<img class="desktop" src="<?php echo get_post_meta( get_the_ID(), 'podcast_file', true ); ?>" />
					<img class="mobile" src="<?php echo get_post_meta( get_the_ID(), 'podcast_file_mobile', true ); ?>" />
				</div>
				<div class="container">
						<div class="labels">
							<label>
								<?php echo get_post_meta( get_the_ID(), 'sectionLabel', true ); ?>
							</label>
							<h2 class="sec-title"><?php echo get_post_meta( get_the_ID(), 'sectionName', true ); ?></h2>
							<div class="plus-icon" data="advertisers">+</div>
						</div>
						<div class="adv-content" data-open="advertisers">
							<div class="close-icon" data="advertisers">x</div>
							<p>
								<?php the_content(); // Dynamic Content ?>
							</p>
							<a href="<?php echo get_post_meta( get_the_ID(), 'link', true ); ?>">
								<?php echo get_post_meta( get_the_ID(), 'linkText', true ); ?>
							</a>
						</div>

						<?php endwhile;

endif;
wp_reset_postdata();
?>
				</div>
			</div>

			<!--advertisers end-->

			<!--affilates start-->

			<div id="affiliates" class="container-fluid double-sec sec">
			   
					<?php
$loop = new WP_Query( array( 'post_type' => 'affiliates') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div class="advImg">
							<img class="desktop" src="<?php echo get_post_meta( get_the_ID(), 'podcast_file', true ); ?>" />
							<img class="mobile" src="<?php echo get_post_meta( get_the_ID(), 'podcast_file_mobile', true ); ?>" />

						</div>
						<div class="container">
						<div class="labels">
							<label>
								<?php echo get_post_meta( get_the_ID(), 'sectionLabel', true ); ?>
							</label>
							<h2 class="sec-title"><?php echo get_post_meta( get_the_ID(), 'sectionName', true ); ?></h2>
							<div class="plus-icon" data="affiliates">+</div>
						</div>
						<div class="adv-content" data-open="affiliates">
						<div class="close-icon" data="advertisers">x</div>
							<p>
								<?php the_content(); // Dynamic Content ?>
							</p>
							<a href="<?php echo get_post_meta( get_the_ID(), 'link', true ); ?>">
								<?php echo get_post_meta( get_the_ID(), 'linkText', true ); ?>
							</a>
						</div>

						<?php endwhile;

endif;
wp_reset_postdata();
?>
				</div>
			</div>

			<!--affilates end-->
			<!--about us start-->

			<div id="about" class="container-fluid ">
				<div class="container">
					<?php
$loop = new WP_Query( array( 'post_type' => 'aboutUS') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div class="row">
							<div class="col-md-6">
								<h2 class="sec-title"><?php echo get_post_meta( get_the_ID(), 'sectionName', true ); ?></h2>
								<div class="about_cont">
									<div class="about_sec one" about="1">

											<?php
											$content = get_post_meta(get_the_ID(), 'about1_box' , true );
												$content = htmlspecialchars_decode($content);
												$content = wpautop( $content );
												echo $content;
											?>
											<button type="button" class="btn btn-primary">
												<?php echo get_post_meta( get_the_ID(), 'btn1', true ); ?>
											</button>

									</div>
									<div class="about_sec two dont-show" about="2">
									<?php
											$content = get_post_meta(get_the_ID(), 'about2_box' , true );
												$content = htmlspecialchars_decode($content);
												$content = wpautop( $content );
												echo $content;
											?>
										<!--	<button  type="button" class="btn btn-primary desktop">
												<?php echo get_post_meta( get_the_ID(), 'btn2', true ); ?>
											</button>
-->

									</div>
									<div class="about_sec three dont-show" about="3">
									<?php
											$content = get_post_meta(get_the_ID(), 'about3_box' , true );
												$content = htmlspecialchars_decode($content);
												$content = wpautop( $content );
												echo $content;
											?>
										<!--	<button type="button" class="btn btn-primary desktop">
												<?php echo get_post_meta( get_the_ID(), 'btn3', true ); ?>
											</button>
-->

											<div class="mobile about-img"><img src="<?php echo get_post_meta( get_the_ID(), 'podcast_file', true ); ?>" /></div>

									</div>
								</div>

							</div>
							<div class="col-md-6">
								<div class="about-img">
									<img src="<?php echo get_post_meta( get_the_ID(), 'podcast_file', true ); ?>" />
								</div>
							</div>
						</div>

						<?php endwhile;

endif;
wp_reset_postdata();
?>
				</div>
				<div class="about-arrows">
									<div class="prev dont-show">
									<span>PREV</span>
										<div><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png"/></div>
										
									</div>
									<div class="next" data="1">
									<span>NEXT</span>
									<div><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png"/></div>
										
									</div>
								</div>
			</div>

			<!--about us end-->
			<!--Services start-->
 
			<div id="services" class="container-fluid sec">
			  
					<?php
$loop = new WP_Query( array( 'post_type' => 'services') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<div class="servicesImg">
										
								<img class="desktop" src="<?php echo get_post_meta( get_the_ID(), 'services_bg', true ); ?>" />
								<img class="mobile" src="<?php echo get_post_meta( get_the_ID(), 'services_bg_mobile', true ); ?>" />
							</div>
  <div class="container">
						<div class="row">

							<div class="labels">
								<label>
									<?php echo get_post_meta( get_the_ID(), 'sectionLabel', true ); ?>
								</label>
								<h2 class="sec-title"><?php echo get_post_meta( get_the_ID(), 'sectionName', true ); ?></h2>
								<div class="plus-icon" data="services">+</div>
							</div>
							<div class="adv-content" data-open="services">
							<div class="close-icon" data="advertisers">x</div>
								<p>
								<?php
											$content = get_post_meta(get_the_ID(), 'services_text_box' , true );
												$content = htmlspecialchars_decode($content);
												$content = wpautop( $content );
												echo $content;
											?>
								</p>
								<!--<a href="<?php echo get_post_meta( get_the_ID(), 'link', true ); ?>">
									<?php echo get_post_meta( get_the_ID(), 'linkText', true ); ?>
								</a>-->
							</div>

							<div class="row">
								<div class="services-icons">
									<div class="service">
									<div class="serviceSquare"></div>
										<div class="service-img"><img src="<?php echo get_post_meta( get_the_ID(), 'service1_icon', true ); ?>" /></div>
										<label>
											<?php echo get_post_meta( get_the_ID(), 'service1', true ); ?>
										</label>
									</div>
									<div class="service">
									<div class="serviceSquare"></div>
										<div class="service-img"><img src="<?php echo get_post_meta( get_the_ID(), 'service2_icon', true ); ?>" /></div>
										<label>
											<?php echo get_post_meta( get_the_ID(), 'service2', true ); ?>
										</label>
									</div>
									<div class="service">
									<div class="serviceSquare"></div>
										<div class="service-img"><img src="<?php echo get_post_meta( get_the_ID(), 'service3_icon', true ); ?>" /></div>
										<label>
											<?php echo get_post_meta( get_the_ID(), 'service3', true ); ?>
										</label>
									</div>
									<div class="service">
									<div class="serviceSquare"></div>
										<div class="service-img"><img src="<?php echo get_post_meta( get_the_ID(), 'service4_icon', true ); ?>" /></div>
										<label>
											<?php echo get_post_meta( get_the_ID(), 'service4', true ); ?>
										</label>
									</div>
									<div class="service">
									<div class="serviceSquare"></div>
										<div class="service-img"><img src="<?php echo get_post_meta( get_the_ID(), 'service5_icon', true ); ?>" /></div>
										<label>
											<?php echo get_post_meta( get_the_ID(), 'service5', true ); ?>
										</label>
									</div>
								</div>
							</div>
						</div>

						<?php endwhile;

endif;
wp_reset_postdata();
?>
				</div>
			</div>

			<!--Services end-->
			<!--contact us start-->
			<div id="contact">
				<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h4 class="sec-title">Contact US</h4>
								<div class="slogan">How can we help?</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="join">
									<h6>Join Our Network </h6>
									<p>For over 4 years, we have been aiming to push the standards of online performance marketing, with the help of our talented and experienced marketing professionals. Put simply, our goal is to provide your online business with powerful tools that will expand brand reach and awareness, boost audience engagement and most importantly - improve results.</p>
									<button class="btn btn-primary"><a href="sign-up">Join now</a></button>
								</div>
							</div>
							<div class="col-md-6">
								<div class="support">
								<h6>Get Support</h6>
									<p>Curious how we can help? 
we’re always happy to communicate and answer your questions</p>
									<button class="btn btn-secondary" id="contactForm"><img class="mobile" src="<?php echo get_template_directory_uri(); ?>/img/contact.png"/>Get in touch</button>
									<div class="contact-form">
										<div class="close">x</div>
										<input type="text" name="Name" placeholder="Name"/>
										<textarea placeholder="Type your message"></textarea>
										<button class="btn btn-secondary">Send It</button>
										<a href="marketing@roi.boutique" target="_top">marketing@roi.boutique</a>

									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
			 <!--contact us end-->

		</div>
		<!-- #content -->
	</div>
	<!-- #primary -->
</div>
<!-- #main-content -->
<?php
 get_footer();