			<!-- footer -->
			<footer class="footer" class="fluid-container" role="contentinfo">
				<div class="container">
					<div class="footer-logo">
						<a href="<?php echo home_url(); ?>/story-ar/#story"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"/></a>
					</div>
					<div class="footer-nav">
						<ul>
							<li><label><a href="<?php echo home_url(); ?>/about-ar">عن سما</a><label></li>
							<li><a href="<?php echo home_url(); ?>/story-ar/#story">كلمة المؤسس</a></li>
							<li><a href="<?php echo home_url(); ?>/story-ar/#about">عنا</a></li>
							<li><a href="<?php echo home_url(); ?>/story-ar/#values">قيمنا الأساسية</a></li>
							<li><a href="<?php echo home_url(); ?>/story-ar/#cap">قدرات</a></li>
							<li><a href="<?php echo home_url(); ?>/story-ar/#team">الفريق</a></li>
						</ul>
						<ul>
							<li><label><a href="<?php echo home_url(); ?>/ar-services">خدماتنا</a><label></li>
							<li><a href="<?php echo home_url(); ?>/ar-services#1">إدارة المطاعم</a></li>
							<li><a href="<?php echo home_url(); ?>/ar-services#2">إدارة البيع بالتجزئة</a></li>
							<li><a href="<?php echo home_url(); ?>/ar-services#3">إدارة الامتياز</a></li>
							<li><a href="<?php echo home_url(); ?>/ar-services#4">إدارة التموين</a></li>
							<li><a href="<?php echo home_url(); ?>/ar-services#5">الاستشارات</a></li>
						</ul>
						<ul>
							<li><label><a href="<?php echo home_url(); ?>/ar-brands">العلامات التجاريه</a><label></li>
							<li><a href="<?php echo home_url(); ?>/ar-brands#1">دايت سنتر</a></li>
							<li><a href="<?php echo home_url(); ?>/ar-brands#2">ألميّاس</a></li>
							<li><a href="<?php echo home_url(); ?>/ar-brands#3">70/30</a></li>
							<li><a href="<?php echo home_url(); ?>/ar-brands#4">مانتي</a></li>
							
							<li><a href="<?php echo home_url(); ?>/ar-brands#5">كبه وبس</a></li>
						</ul>
						<ul>
							<li><label><a href="<?php echo home_url(); ?>/ar-careers">وظائف</a><label></li>

						</ul>
						<ul>
							<li><label>الملفات<label></li>
							<?php
$loop = new WP_Query( array( 'post_type' => 'main') );
if ( $loop->have_posts() ) :
while ( $loop->have_posts() ) : $loop->the_post(); ?>

<li><a href="<?php echo get_post_meta( get_the_ID(), 'profile', true ); ?>">Company Profile (E)</a></li>

				

					<?php endwhile;

endif;
wp_reset_postdata();
?>

						</ul>
						<ul>
							<li><label><a href="<?php echo home_url(); ?>/contact-us-ar">اتصل بنا</a><label></li>

						</ul>
					</div>

				</div>
				<div class="copy-rights">
				جميع الحقوق محفوظة (c) شركة سما للتجهيزات الغذائية
					</div>
			</footer>
			<a href ="#top" class="arrow-up"><i class="fa fa-angle-up"></i></a>

			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->

		<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  crossorigin="anonymous"></script>
  <script type="text/javascript" id="slick" src="<?php echo get_template_directory_uri(); ?>/js/slick.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script type="text/javascript"  src="<?php echo get_template_directory_uri(); ?>/js/scripts-ar.js" ></script>
<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZZL28FQBZZ"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

 

  gtag('config', 'G-ZZL28FQBZZ');

</script>


	</body>
</html>
