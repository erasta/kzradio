<?php get_header(); ?>
<main class="container">
	<div class="row">
		<div id="content" role="main">
			<?php get_template_part('loops/index-loop'); ?>
		</div><!-- /#content -->
		<?php get_sidebar(); ?>
	</div><!-- /.row -->
</main><!-- /.container -->
<?php get_footer(); ?>