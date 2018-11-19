<?php
/**
 * The template for displaying all posts.
 */

get_header();
?>
	<main id="main">
		<div id="content" role="main">
			<div class="container-fluid shows shows-wrapper" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');">
				<?php if( have_posts() ) {
						while( have_posts() ) { the_post();
							get_template_part('loops/show');
						}
				} ?>
			</div><!--.container.shows--->
		</div><!--#content-->
	</main>
</div>
<?php get_footer(); ?>