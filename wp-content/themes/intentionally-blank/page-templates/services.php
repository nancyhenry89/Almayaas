<?php /* Template Name: services Template */ get_header(); ?>

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

					<div class="banner" id="servicesBanner">
							<img src="<?php echo get_post_meta( get_the_ID(), 'servicesBanner', true ); ?>">
							</img>

					</div>

					<?php endwhile;

endif;
wp_reset_postdata();
?>

			</div>
    <!--brands start-->

			<div id="services" class="container-fluid">

            <?php
$loop = new WP_Query( array( 'post_type' => 'services') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<div class="service" id="1" data="1">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-6 ser-icon">
                            <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/plate.png"/>
                            <div class="number">1</div>
                            </div>
                        </div>
                        <div class="col-md-6 ser-details">
                            <div class="sec-head">
                                <?php echo get_post_meta( get_the_ID(), 'service1_title', true ); ?>
                            </div>
                            <div class="ser-text">
                            <?php echo get_post_meta( get_the_ID(), 'service1', true ); ?>                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                

				<div class="service" id="2" data="2">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-6 ser-icon">
                            <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/s2.png"/>
                            <div class="number">2</div>
                            </div>
                        </div>
                        <div class="col-md-6 ser-details">
                            <div class="sec-head">
                                <?php echo get_post_meta( get_the_ID(), 'service2_title', true ); ?>
                            </div>
                            <div class="ser-text">
                            <?php echo get_post_meta( get_the_ID(), 'service2', true ); ?>                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="service" id="3" data="3">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-6 ser-icon">
                            <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/s3.png"/>
                            <div class="number">3</div>
                            </div>
                        </div>
                        <div class="col-md-6 ser-details">
                            <div class="sec-head">
                                <?php echo get_post_meta( get_the_ID(), 'service3_title', true ); ?>
                            </div>
                            <div class="ser-text">
                            <?php echo get_post_meta( get_the_ID(), 'service3', true ); ?>                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="service" id="4" data="4">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-6 ser-icon">
                            <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/s4.png"/>
                            <div class="number">4</div>
                            </div>
                        </div>
                        <div class="col-md-6 ser-details">
                            <div class="sec-head">
                                <?php echo get_post_meta( get_the_ID(), 'service4_title', true ); ?>
                            </div>
                            <div class="ser-text">
                            <?php echo get_post_meta( get_the_ID(), 'service4', true ); ?>                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="service" id="5" data="5">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-6 ser-icon">
                            <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/s5.png"/>
                            <div class="number">5</div>
                            </div>
                        </div>
                        <div class="col-md-6 ser-details">
                            <div class="sec-head">
                                <?php echo get_post_meta( get_the_ID(), 'service5_title', true ); ?>
                            </div>
                            <div class="ser-text">
                            <?php echo get_post_meta( get_the_ID(), 'service5', true ); ?>                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="service" id="6" data="6">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-6 ser-icon">
                            <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/s6.png"/>
                            <div class="number">6</div>
                            </div>
                        </div>
                        <div class="col-md-6 ser-details">
                            <div class="sec-head">
                                <?php echo get_post_meta( get_the_ID(), 'service6_title', true ); ?>
                            </div>
                            <div class="ser-text">
                            <?php echo get_post_meta( get_the_ID(), 'service6', true ); ?>                            </div>
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
			</div>
			</div>
			<!--brands end-->

			<?php
get_footer();