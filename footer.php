<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<form action="/" method="get">
		  	<label for="search">חפשו באתר</label>
		  	<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
		  	<?php $search = get_field('search_icon', 'options'); ?>
		  	<input type="image" alt="Search" src="<?php echo $search['sizes']['large']; ?>" />
		</form>
    </div>
  </div>
</div>

<footer>
	<div class="footer-credits container">
		<div class="social inner-credits mx-auto">
			<div class="title">
				<?php the_field('social_networks_header', 'options'); ?>
			</div>
			<div class="icons-container">
				<?php if (have_rows('social_networks', 'options')):
				while (have_rows('social_networks', 'options')): the_row();
				$social_icon = get_sub_field('icon'); ?>

					<a href="<?php the_sub_field('url'); ?>" class="social-icon" target="_blank">
						<img src="<?php echo $social_icon; ?>">
					</a>

				<?php endwhile;
				endif; ?>
			</div>
		</div>
		<div class="thanks inner-credits mx-auto">
			<div class="title">
				<?php the_field('special_thanks_header', 'options'); ?>
			</div>
			<div class="icons-container">
				<?php if (have_rows('special_thanks', 'options')):
				while (have_rows('special_thanks', 'options')): the_row();
				$thanks_icon = get_sub_field('icon'); ?>

				<a href="<?php the_sub_field('url'); ?>" class="social-icon" target="_blank">
					<img src="<?php echo $thanks_icon['sizes']['medium']; ?>" title="<?php echo $thanks_icon['title']; ?>">
				</a>

				<?php endwhile;
				endif; ?>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

<?php include_once('schedule.php'); ?>
<?php include_once('player-footer.js'); ?>
<?php include_once('document-ready.js'); ?>

</body>
</html>