<?php /* Template Name: careers Template */ get_header('arabic'); ?>

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

<div class="banner" id="careersBanner">
							<img src="<?php echo get_post_meta( get_the_ID(), 'careersBannerar', true ); ?>">
							</img>

					</div>

					<?php endwhile;

endif;
wp_reset_postdata();
?>

			</div>
                <div class="careers">
                    <div class="container-fluid">

                        <div class="container jobs">

                            <div class="row">
                                <div class="col-md-12">
                                <?php
$loop = new WP_Query( array( 'post_type' => 'careers') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <div class="job">
                                        <h4 class="j-title">
                                            الوظيفه
                                        </h4>
                                        <p class="j-desc">

                                        <?php echo get_post_meta( get_the_ID(), 'titlear', true ); ?>                                    </p>
                                        <h4 class="j-title">
                                        متطلبات الوظيفه
                                        </h4>
                                        <p class="j-desc">
                                        <?php echo get_post_meta( get_the_ID(), 'descar', true ); ?>                                    </p>
                                        </p>
                                        <button type="button" data-target="#cv" data-toggle="modal" class="j-button">تقديم <i class="fa fa-angle-left"></i></button>                                    </div>

                                        <?php endwhile;

endif;
wp_reset_postdata();
?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="cv" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">تحميل السيره الذاتيه</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="file-upload">
                <?php echo do_shortcode( '[wordpress_file_upload] ' ); ?>
       </div>
      </div>

    </div>
  </div>
</div>













			</div>
			</div>
			</div>
			<!--brands end-->

			<?php
get_footer('ar');