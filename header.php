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
        <?php if (strpos($_SERVER["HTTP_HOST"], "beta.kzradio.net") === FALSE) { ?>
            /////<!-- Google Tag Manager -->
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-W8VQ534');
            /////<!-- End Google Tag Manager -->
        <?php } else { ?>
            console.log("Beta dev site - no analytics.")
        <?php } ?>
    </script>
    <noscript>
      <img height="1" width="1" style="display:none"
           src="https://www.facebook.com/tr?id=791624944509880&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

<?php if (strpos($_SERVER["HTTP_HOST"], "beta.kzradio.net") === FALSE) { ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8VQ534" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php } else { ?>
    <script>console.log("Beta dev site - no analytics on body.")</script>
<?php } ?>

<div class="container-fluid bg-dark" style="padding: 0;">
	<div class="row " id="header">
		<nav class="navbar navbar-expand-md navbar-dark" id="kzNav">
			<div class="left-stuff">
				<?php $search = get_field('search_icon', 'options'); ?>
				<a class="trigger-search" href="<?php echo get_site_url().'/last-shows'; ?>" data-toggle="modal" data-target="#searchModal">
					<img class="search-icon" src="https://www.kzradio.net/wp-content/uploads/2018/09/shape@3x.png" />
				</a>
				<a href="<?php the_field('donate_link', 'options'); ?>" class="donate-link">
					<img class="donate-button" src="https://www.kzradio.net/wp-content/uploads/2018/10/donate@2x.png"/>
					<img class="donate-image" src="https://www.kzradio.net/wp-content/uploads/2018/10/cat@2x.png"/>
				</a>
			</div>

			<div class="header-main">
				<div>
					<a class="navbar-brand" href="/">
						<canvas id="plasma" style="display: none"></canvas>
						<img id="logo-img" src="https://www.kzradio.net/wp-content/uploads/2018/09/kz-logo-black@3x.png" class="logo" alt="<?php echo get_bloginfo('name'); ?>" />
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
				<div class="adv-wrapper">
					<!--<a href="https://pandazzz.co.il/" class="social-icon adv-logo" target="_blank">
						<img src="/wp-content/themes/kzradio/uploads/panda-white@2x.png" title="Panda">
					</a>
					<a href="https://www.payngo.co.il/" class="social-icon adv-logo" target="_blank">
						<img src="/wp-content/themes/kzradio/uploads/mh-logo@2x.jpg" title="מחסני חשמל">
					</a>-->
					<!-- <a href="https://www.flying.co.il" class="social-icon adv-logo wider" target="_blank">
						<img src="/wp-content/themes/kzradio/uploads/carpet-logo@2x.png" title="השטיח המעופף">
					</a>-->
				</div>
			</div>
		</nav>
	</div>
</div>