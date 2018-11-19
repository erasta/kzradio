<?php get_header(); ?>
<main class="container" id="main">
	<div class="row">
		<div id="content" role="main">
			<?php get_template_part('loops/page-content'); ?>
		</div><!-- /#content -->
		<?php get_sidebar(); ?>
	</div><!-- /.row -->
</main><!-- /.container -->
<?php get_footer(); ?>