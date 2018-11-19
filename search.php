<?php get_header(); ?>
<main class="container">
	<div class="row">
		<div id="content" role="main">
			<header>
				<h1><?php _e('Search Results for', 'b4st'); ?> &ldquo;<?php the_search_query(); ?>&rdquo;</h1>
			</header>
			<?php get_template_part('loops/search-results'); ?>
		</div><!-- /#content -->
		<?php get_sidebar(); ?>
	</div><!-- /.row -->
</main><!-- /.container -->
<?php get_footer(); ?>