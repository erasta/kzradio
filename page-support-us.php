<?php
/**
 * Template Name: Support
 * The template for displaying all posts.
 */
 
get_header(); 
?>

<main class="container support" id="main">
	<div class="row">
		<div id="content" role="main">
			<div id="wrapper-support">
				<div class="support-width">
					<div class="intro">
						<p>
							<?php the_field( 'intro_text' ); ?>
						</p>
					</div>
					<div class="entry-content">
						<?php the_field( 'main_text' ); ?>
					</div>
					
					<div class="banners">
						<div class="banner">
							<div class="textual-content">
								<h2 class="banner-title"><?php the_field( 'title1' ); ?></h2>
								<p>
									<?php the_field( 'text1' ); ?>
								</p>
							</div>
							<div class="btn-wrapper">
								<a href="<?php the_field( 'button_url1' ); ?>" target="_blank" class="banner-btn">
									<img src="<?php bloginfo('template_url'); ?>/theme/images/become-a-patron-button.png" alt="Become a Patron">
								</a>
							</div>
						</div>
						
						<div class="banner">
							<div class="textual-content">
								<h2 class="banner-title"><?php the_field( 'title2' ); ?></h2>
								<p><?php the_field( 'text2' ); ?></p>
							</div>
							<div class="btn-wrapper">
								<a href="<?php the_field( 'button_url2' ); ?>" target="_blank" class="banner-btn">
									<img src="<?php bloginfo('template_url'); ?>/theme/images/paypal.jpg" alt="Check out with PayPal">
								</a>
							</div>
						</div>
						
						<div class="banner">
							<div class="textual-content">
								<h2 class="banner-title"><?php the_field( 'title3' ); ?></h2>
								<p><?php the_field( 'text3' ); ?></p>
							</div>
							<div class="btn-wrapper textual">
								<a href="<?php the_field( 'button_url3' ); ?>" target="_blank" class="banner-btn">
									<?php the_field( 'button_label3' ); ?>
								</a>
							</div>
						</div>
						
						

					</div><!--.banners-->
				</div><!--.support-width-->
			</div>
		</div><!-- /#content -->
		<?php get_sidebar(); ?>
	</div><!-- /.row -->
</main><!-- /.container -->
<?php get_footer(); ?>