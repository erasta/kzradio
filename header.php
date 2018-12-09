<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta name="description" content="<?php if ( is_single() ) {
		single_post_title('', true);
	} else {
		bloginfo('name'); echo " - "; bloginfo('description');
	}
	?>" />
	<script>
		if (window.location.hostname.indexOf("beta.kzradio.net") != -1) {
			console.log("Beta dev site - no analytics.")
		} else {
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-30034653-1', 'auto');
			ga('send', 'pageview');
		}
	</script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
		<link type="text/css" href="/css/jplayer/blue.monday/css/jplayer.blue.monday.css?reload2" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700,900" rel="stylesheet">
		<script type="text/javascript" src="/js/jquery.jplayer.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/theme/js/app.js"></script>

		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen" />

<script type="text/javascript"> <?php include_once('player-header.js'); ?> </script>
<script type="text/javascript"> <?php include_once('animation.js'); ?> </script>

</head>
<body <?php body_class(); ?>>

<div class="container-fluid bg-dark" style="padding: 0;">
	<div class="row " id="header">
		<nav class="navbar navbar-expand-md navbar-dark" id="kzNav">
			<div class="left-stuff">
				<?php $search = get_field('search_icon', 'options'); ?>
				<!--<a class="trigger-search" href="#" data-toggle="modal" data-target="#searchModal">-->
				<a class="trigger-search" href="<?php echo get_site_url().'/last-shows'; ?>" data-toggle="modal" data-target="#searchModal">
					<img class="search-icon" src="<?php echo $search['sizes']['large']; ?>" />
				</a>
				<a href="<?php the_field('donate_link', 'options'); ?>" class="donate-link">
					<img class="donate-button" src="<?php the_field('donate_button', 'options'); ?>"/>
					<img class="donate-image" src="<?php the_field('donate_image', 'options'); ?>"/>
				</a>
			</div>

			<div class="header-main">
				<?php $logo = get_field('logo', 'options'); ?>
				<!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>-->
				<div>
					<a class="navbar-brand" href="/">
						<canvas id="plasma" style="display: none"></canvas>
						<img id="logo-img" src="<?php echo $logo['sizes']['large']; ?>" class="logo" alt="<?php echo $logo['alt']; ?>" />
					</a>
				</div>

				<div class="ml-auto" id="navbarDropdown">

					<?php
						wp_nav_menu( array(
							'theme_location'	=> 'navbar',
							'container'			=> false,
							'menu_class'		=> '',
							'fallback_cb'		=> '__return_false',
							'items_wrap'		=> '<ul id="%1$s" class="navbar-nav %2$s">%3$s</ul>',
							'depth'				=> 2,
							'walker'			=> new b4st_walker_nav_menu()
						) );
					?>
				</div>
			</div>

			<div class="powered">
				<div class="powered-label">Powered by</div>
				<a href="https://www.bpm-music.com/" class="social-icon" target="_blank">
					<img src="/wp-content/uploads/2018/08/bpm@2x.png" title="BPM">
				</a>
			</div>
		</nav>
	</div>
</div>
