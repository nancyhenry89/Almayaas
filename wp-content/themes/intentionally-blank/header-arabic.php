<!doctype html>
<html  dir="rtl" lang="ar" class="no-js">
	<head>
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link rel="stylesheet" href="https://use.typekit.net/wqw3ijv.css">
		<link 
  rel="stylesheet"
  href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
  integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe"
  crossorigin="anonymous" />
  		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		  <meta name="keywords" content="kuwait,kuw,catering,food,healthy,lebanese,frozen,retail,restaurant,health,diet,q8,catering,consultancy">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
        <link id="mainStyle" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles-ar.css" >
        <link id="slick" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.css" >
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
		<?php wp_head(); ?>


	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper container-fluid">

			<!-- header -->
			<header class="header clear" role="banner">
			<div class="mobile-nav"><i class="fas fa-bars"></i></div>

			<div class="lang-switch"><a href="<?php echo home_url(); ?>">E</a></div>
			<a class="insta" href="https://www.instagram.com/samacateringco/" target="_blank"><i class="fab fa-instagram"></i></a>

					<div class="header-nav">
					<ul>				
							<li><a href="<?php echo home_url(); ?>/about-ar">عن سما</a></li>
							<li><a href="<?php echo home_url(); ?>/ar-services">خدماتنا</a></li>
							<li>
								<!-- logo -->
							<div class="logo">
								<a href="<?php echo home_url(); ?>/story-ar">
									<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
									<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img">
								</a>
							</div>
					<!-- /logo -->
							</li>
							<li><a href="<?php echo home_url(); ?>/ar-brands">العلامات التجارية</a></li>
							<li><a href="<?php echo home_url(); ?>/contact-us-ar">اتصل بنا</a></li>
							
					</div>
					<!-- nav -->
					<div class="desktop-nav">


					</div>
						</ul>

					</div>

					<!--<nav class="nav" role="navigation">
						<?php //html5blank_nav(); ?>
					</nav>-->
					<!-- /nav -->

			</header>
			<!-- /header -->
