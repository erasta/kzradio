<?php get_header(); ?>
<main class="container">
	<div class="row">
			<?php if ( have_posts() ) : ?>
			<h1 class="shows-main-title">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			</h1>
			<div class="shows-subtitle">
				<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
			</div>
			<?php endif; ?>
		<div id="content" role="main">
			<?php get_template_part('loops/index-loop'); ?>
		</div><!-- /#content -->
		<?php get_sidebar(); ?>
	</div><!-- /.row -->
</main><!-- /.container -->
<?php get_footer(); ?>