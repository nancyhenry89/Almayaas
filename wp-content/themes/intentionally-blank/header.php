<!doctype html>
<html  dir="ltr" lang="en" class="no-js">
	<head>
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link rel="stylesheet" href="https://use.typekit.net/wqw3ijv.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<meta name="keywords" content="kuwait,kuw,catering,food,healthy,lebanese,frozen,retail,restaurant,health,diet,q8,catering,consultancy">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
        <link id="mainStyle" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css" >
        <link id="slick" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.css" >
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&family=Roboto&family=Source+Sans+Pro&display=swap" rel="stylesheet">
		<?php wp_head(); ?>


	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper container-fluid">

			<!-- header -->
			<header class="header clear" role="banner">
			<div class="mobile-nav"><i class="fas fa-bars"></i></div>
			<div class="lang-switch"><a href="<?php echo home_url(); ?>/home-ar">ع</a></div>


					<div class="header-nav">
					<!-- logo -->
						<div class="logo">
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img">
								</a>
							</div>
					<!-- /logo -->
					<ul>				
							<li><a href="#story">Our Story</a></li>
							<li><a href="#about">About Us</a></li>
							<li><a href="#services">Services</a></li>
							<li><a href="#gallery">Photo Gallery</a></li>
							<li><a href="#delivery">Delivery</a></li>
							<li><a href="#contact">Contact Us</a></li>
							
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
