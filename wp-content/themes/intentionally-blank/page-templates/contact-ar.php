<?php /* Template Name: careers ar Template */ get_header('arabic');?>

    <div id="main-content" class="main-content">

<?php
//if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
// Include the featured content template.
//get_template_part( 'featured-content' );

?>    
   <div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
                <div class="contact">
                    <div class="container bg">
                        <div class="row">
                            <div class="frame">
                                <div class="col-md-4">
                                    <div class="sec-head">اتصل بنا</div>


                                    <?php
$loop = new WP_Query( array( 'post_type' => 'contact') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <div class="phone">
                                        <div class="c-title">الهاتف</div>
                                        <div class="c-detail">
                                            <p style="direction:ltr;float:right"><?php echo get_post_meta( get_the_ID(), 'phone', true ); ?></p>
                                        </div>
                                    </div>
                                    <div class="mail">
                                        <div class="c-title">البريد الالكتروني</div>
                                        <div class="c-detail">
                                            <p><a href="<?php echo get_post_meta( get_the_ID(), 'email', true ); ?>"><?php echo get_post_meta( get_the_ID(), 'email', true ); ?></a></p>
                                        </div>
                                    </div>
                                    <div class="address">
                                        <div class="c-title">العنوان</div>
                                        <div class="c-detail">
                                            <p><?php echo get_post_meta( get_the_ID(), 'addar', true ); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3478.0054147005226!2d47.93899681509871!3d29.340837082143736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf854a7782564b%3A0x145d6a0bdb21fb30!2zRGlldCBDZW50ZXIgfCDYr9in2YrYqiDYs9mG2KrYsQ!5e0!3m2!1sen!2seg!4v1609680259521!5m2!1sen!2seg" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                                </div>
						<?php endwhile;

endif;
wp_reset_postdata();
?>




                            </div>
                        </div>
                    </div>
                </div>
			</div>
			</div>
			</div>
			<!--contact end-->

			<?php
get_footer('ar');