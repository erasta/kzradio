<?php
/*
The Single Post
===============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<article role="article" id="post_<?php the_ID()?>" <?php post_class('single-post-container')?>>
		<?php if (has_post_thumbnail()):
			 $thumbnail = get_the_post_thumbnail_url();
			 else:
			 $thumbnail = "http://beta.kzradio.net/wp-content/uploads/2018/11/pexels-photo-744318.jpeg";
		endif; ?>
		<header style="background-image: url('<?php echo $thumbnail; ?>');">
			<div class="blog-post-titles">
				<h1><?php the_title(); ?></h1>	
				<h2>מגזין הקצה</h2>
			</div>
		</header>
		<main>
			<div class="single-post-content">
				<?php the_content(); ?>
			</div>
		</main>
		<footer>
			<p class="blog-post-meta">
				--<br>
				 
				<br>
				<!--?php _e('פורסם בבלוג בתאריך ', 'b4st'); b4st_post_date(); ?-->
				<span class="entry-date">פורסם בתאריך <?php echo get_the_date(); ?></span><br>
				<!-- Reveal after we have a tags and categories page -->
				<!--?php _e('במדור ', 'b4st'); the_category(', ') ?><br-->
				<!--?php if (has_tag()) { the_tags('יש מצב שזה קשור גם לנושאים האלה: ', ', '); } ?-->
			</p>
		</footer>
	</article>
	<?php
endwhile; else :
	get_template_part('loops/404');
endif;
?>
