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
		  	<input type="image" alt="Search" src="<?php echo $search; ?>" />
		</form>
    </div>
  </div>
</div>

<footer>
	<div class="footer-credits container">
		<div class="social inner-credits mx-auto">
			<div class="title">הקצה בכל המדיות החברתיות:</div>
			<div class="icons-container social">
				<a href="https://itunes.apple.com/il/app/kzradio-%D7%94%D7%A7%D7%A6%D7%94/id1223563497?mt=8&fbclid=IwAR3afRwVeYqk6ZI3Bs9DMDD3GyRJ2fR_p7SpVMqC6q4VdJ-qssPLbYdSAqI" class="social-icon" target="_blank">
					<img src="https://www.kzradio.net/wp-content/uploads/2019/05/apple-store-white.svg">
				</a>
				<a href="https://play.google.com/store/apps/details?id=com.nobexinc.wls_6997585377.rc&hl=en&fbclid=IwAR1aNGjcB0bc7EvFy8EHrfIV5JNKLi3TpduYVeWRkVyyPS449GcC9X6QmXo" class="social-icon" target="_blank">
					<img src="https://www.kzradio.net/wp-content/uploads/2019/05/google-play-store-white.svg">
				</a>
				<a href="https://www.facebook.com/KZradio.net/" class="social-icon" target="_blank">
					<img src="https://www.kzradio.net/wp-content/uploads/2018/11/facebook.svg">
				</a>
				<a href="https://www.instagram.com/kzradio/" class="social-icon" target="_blank">
					<img src="https://www.kzradio.net/wp-content/uploads/2018/11/instagram.svg">
				</a>
				<!-- <a href="https://open.spotify.com/show/3CCpMyDKH1x4QBGp2xt4yB?fbclid=IwAR0jJIc-Y3Kqe_6gCxK-GjZ8ydVx1WaBkKwUhdyQTfKvEfhkY3eEqVXYUSc" class="social-icon" target="_blank">
					<img src="https://www.kzradio.net/wp-content/uploads/2019/05/spotify.svg">
				</a> -->
				<a href="https://podcasts.apple.com/il/podcast/kzradio-%D7%94%D7%A7%D7%A6%D7%94/id1062683281?fbclid=IwAR3bGsUAy9h4nTbvbCFIs0GbHZFax-zlC_SK6ruMns6wM3klkmdfT8qGcdk" class="social-icon" target="_blank">
					<img src="https://www.kzradio.net/wp-content/uploads/2019/05/icons8-itunes.svg">
				</a>
				<a href="https://www.mixcloud.com/kzradio%D7%94%D7%A7%D7%A6%D7%94/?fbclid=IwAR1nEzWmJy8AcRzsXVmFv5K6HxcB3pjjplz6koHDlNMK8T1_rw_rZufcatQ" class="social-icon" target="_blank">
					<img src="https://www.kzradio.net/wp-content/uploads/2019/05/mixcloud.svg">
				</a>
				<a href="https://twitter.com/kzrnet" class="social-icon" target="_blank">
					<img src="https://www.kzradio.net/wp-content/uploads/2018/11/twitter.svg">
				</a>
				<a href="https://www.youtube.com/user/KZRadio" class="social-icon" target="_blank">
					<img src="https://www.kzradio.net/wp-content/uploads/2018/11/youtube.svg">
				</a>
			</div>
		</div>
		<div class="thanks inner-credits mx-auto">
			<div class="title">:Powered by</div>
			<div class="icons-container">
				<a href="https://www.bpm-music.com/" class="social-icon" target="_blank">
					<img src="https://www.kzradio.net/wp-content/uploads/2018/08/bpm@2x.png" title="BPM">
				</a>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

<?php include_once('schedule.php'); ?>
<script><?php include_once('player-footer.js'); ?></script>
<script><?php include_once('document-ready.js'); ?></script>

</body>
</html>