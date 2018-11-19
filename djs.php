<?php 
/**
 * Template Name: DJ
 */
get_header(); ?>
<main class="container" id='dj-page'>
	<?php 
	if (function_exists('has_post_thumbnail')) {
	    if ( has_post_thumbnail() ) {
	         $thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
			$thumbnail = $thumb_url[0];
	    }
	    else $thumbnail = '';
	}
	?>
	<div id="dj-header" class="row" style="background: url('<?php echo $thumbnail; ?>') no-repeat; background-position: center; ">
		<h1><?php the_title() ?></h1>
		<h1>שדרן</h1>
	<div class="row">
		<div id="content" role="main">
			<div class='col-2'>
				<div id='about-dj' class='content-box'></div>
			</div>
			<div class='col-2'>
				<div id='next-party'></div>
				<div id='spotify'></div>
			</div>
		</div><!-- /#content -->
		<?php get_sidebar(); ?>
	</div><!-- /.row -->
</main><!-- /.container -->
<?php get_footer(); ?>