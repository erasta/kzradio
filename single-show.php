<?php
/**
 * Template Name: Single Show Episode
 * The template for displaying an episode of a show
 */

get_header();
?>

<main class="container-fluid no-padding">
	<div class="row">
		<div id="content" role="main">
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<article role="article" id="post_<?php the_ID()?>" <?php post_class('episode-container');?> <?php if( get_field('adv_show')) echo 'style="background-color:'.get_field('background_color').'; background-blend-mode: multiply;"';?>>
					<?php
						$show = wp_get_post_terms($post->ID, 'shows');
                        $djs_term = wp_get_post_terms($post->ID, 'djs');
						if (has_post_thumbnail()) {
							$thumbnail = get_the_post_thumbnail_url();
						} else {
							$thumbnail = wp_get_attachment_image_src(get_field('show_image', 'shows_'.$show['0']->term_id), 'full')[0];
							set_post_thumbnail( $post, get_field('show_image', 'shows_'.$show['0']->term_id ) );
						}
                        $thumbnail_position = get_field('show_image_position', 'shows_'.$show['0']->term_id);
                        $backpos = $thumbnail_position ? ' background-position: 50% ' . $thumbnail_position . '%;' : '';
					?>
					<header id="episode-header" class="center-bg" style="background-image: url('<?php echo $thumbnail; ?>');<?php echo $backpos; ?>">
						<div id="episode-meta">
                            <div class="episode-dj-title">
                                <?php if(get_field('adv_show')){?>
									<img class="adv-logo-show" src="<?php the_field('adv_logo'); ?>" alt="<?php echo $term->name; ?>">
								<?php } else {
									foreach ($djs_term as $term) { ?>
										<span><a href="<?php echo get_term_link( $term ) ?>" class="data od-show-dj"><?php echo $term->name; ?></a></span>
									<?php }
								} ?>
                            </div>

							<?php if(get_field('adv_show')) { ?>
								<h2 class="episode-title"
									<?php if (strpbrk(get_the_title(), "אבגדהוזחטיכלמנסעפרקשתןםךףץ") == false) echo "style='direction: ltr'"; ?> >
									<span><?php the_title(); ?></span>
								</h2>
								<h1 class="episode-show-title">
									<span>
										<a href="<?php echo get_term_link( $show['0']->term_id ); ?>">
											<?php echo $show['0']->name; ?>
										</a>
									</span>
								</h1>
							<?php } else { ?>
								<h1 class="episode-show-title">
									<span>
										<a href="<?php echo get_term_link( $show['0']->term_id ); ?>">
											<?php echo $show['0']->name; ?>
										</a>
									</span>
								</h1>
								<h2 class="episode-title"
									<?php if (strpbrk(get_the_title(), "אבגדהוזחטיכלמנסעפרקשתןםךףץ") == false) echo "style='direction: ltr'"; ?> >
									<span><?php the_title(); ?></span>
								</h2>
							<?php } ?>
                        </div>
					</header>
					<main>
						<div class="episode-content">
							<?php
								$title = get_the_title();
								$p_title = str_replace("'", "", $title);
							 	$stream_link = get_field('stream_link');

								if ($stream_link): ?>
		                            <a class="play-show" href="javascript:loadmp3('<?php echo $stream_link; ?>','<?php echo $p_title; ?>', '<?php echo $thumbnail; ?>')">
        		                        <img src="<?php echo get_template_directory_uri(); ?>/uploads/play.png" />
                		            </a>
							<?php endif; ?>

							<div class="episode-content">
								<?php the_content(); ?>
							</div>

							<div class="episode-date">התכנית שודרה בתאריך <?php echo get_the_date(); ?></div>

							<!-- Tags -->
							<div class="show-tags">
							<?php
								$tags = get_the_tags();
								if ($tags):
									foreach ($tags as $key => $value):
							?>
										<span class="show-tag"><?php echo $value -> name; ?></span>

							<?php
									endforeach;
								endif;
							?>
                            </div>

                            <!-- Playlist -->
                            <div class="share">
                                <div>Share-למען ה</div>
                                <div class="buttons">
                                    <a href="https://telegram.me/share/url?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" style="width: 36px; height: 36px;">
                                        <svg width="36" height="36" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1189 1307l147-693q9-44-10.5-63t-51.5-7l-864 333q-29 11-39.5 25t-2.5 26.5 32 19.5l221 69 513-323q21-14 32-6 7 5-4 15l-415 375-16 228q23 0 45-22l108-104 224 165q64 36 81-38zm603-411q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z" fill="#fff"/></svg>
                                    </a>
                                    <a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" style="width: 36px; height: 36px;">
                                        <svg width="36" height="36" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1376 128q119 0 203.5 84.5t84.5 203.5v960q0 119-84.5 203.5t-203.5 84.5h-188v-595h199l30-232h-229v-148q0-56 23.5-84t91.5-28l122-1v-207q-63-9-178-9-136 0-217.5 80t-81.5 226v171h-200v232h200v595h-532q-119 0-203.5-84.5t-84.5-203.5v-960q0-119 84.5-203.5t203.5-84.5h960z" fill="#fff"/></svg>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&via=KZRnet" target="_blank" style="width: 36px; height: 36px;">
                                        <svg width="36" height="36" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1408 610q-56 25-121 34 68-40 93-117-65 38-134 51-61-66-153-66-87 0-148.5 61.5t-61.5 148.5q0 29 5 48-129-7-242-65t-192-155q-29 50-29 106 0 114 91 175-47-1-100-26v2q0 75 50 133.5t123 72.5q-29 8-51 8-13 0-39-4 21 63 74.5 104t121.5 42q-116 90-261 90-26 0-50-3 148 94 322 94 112 0 210-35.5t168-95 120.5-137 75-162 24.5-168.5q0-18-1-27 63-45 105-109zm256-194v960q0 119-84.5 203.5t-203.5 84.5h-960q-119 0-203.5-84.5t-84.5-203.5v-960q0-119 84.5-203.5t203.5-84.5h960q119 0 203.5 84.5t84.5 203.5z" fill="#fff"/></svg>
                                    </a>
                                    <a href="whatsapp://send?text=<?php the_title(); ?> [at] KZRadio - <?php the_permalink(); ?>" target="_blank" style="width: 36px; height: 36px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" width="36px" height="36px" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 448 512"><path d="M224 122.8c-72.7 0-131.8 59.1-131.9 131.8 0 24.9 7 49.2 20.2 70.1l3.1 5-13.3 48.6 49.9-13.1 4.8 2.9c20.2 12 43.4 18.4 67.1 18.4h.1c72.6 0 133.3-59.1 133.3-131.8 0-35.2-15.2-68.3-40.1-93.2-25-25-58-38.7-93.2-38.7zm77.5 188.4c-3.3 9.3-19.1 17.7-26.7 18.8-12.6 1.9-22.4.9-47.5-9.9-39.7-17.2-65.7-57.2-67.7-59.8-2-2.6-16.2-21.5-16.2-41s10.2-29.1 13.9-33.1c3.6-4 7.9-5 10.6-5 2.6 0 5.3 0 7.6.1 2.4.1 5.7-.9 8.9 6.8 3.3 7.9 11.2 27.4 12.2 29.4s1.7 4.3.3 6.9c-7.6 15.2-15.7 14.6-11.6 21.6 15.3 26.3 30.6 35.4 53.9 47.1 4 2 6.3 1.7 8.6-1 2.3-2.6 9.9-11.6 12.5-15.5 2.6-4 5.3-3.3 8.9-2 3.6 1.3 23.1 10.9 27.1 12.9s6.6 3 7.6 4.6c.9 1.9.9 9.9-2.4 19.1zM400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM223.9 413.2c-26.6 0-52.7-6.7-75.8-19.3L64 416l22.5-82.2c-13.9-24-21.2-51.3-21.2-79.3C65.4 167.1 136.5 96 223.9 96c42.4 0 82.2 16.5 112.2 46.5 29.9 30 47.9 69.8 47.9 112.2 0 87.4-72.7 158.5-160.1 158.5z" fill="white"/></svg>
                                    </a>
                                </div>
                            </div>

							<!-- Playlist -->
                            <div class="episode-playlist">פלייליסט</div>
							<?php
								$playlist = get_field('show_playlist');
								if ($playlist) {
							?>
									<div class="playlist">
										<?php foreach(explode("\n", str_replace(array("<p>", "</p>"), "\n", $playlist)) as $song) {
                                            if (trim($song) != "") {
                                                echo("<p>" . htmlspecialchars($song) . "</p>");
                                            }
                                        } ?>
									</div>
							<?php
								} else {
							?>
									<div class="no-playlist">
										הפלייליסט לתכנית זו יפורסם בקרוב...
									</div>
							<?php
								}
							?>


						</div><!-- /.episode-content -->
					</main>
				</article>
			<?php endwhile; ?>
			<?php endif; ?>
		</div><!-- /#content -->
	</div><!-- /.row -->



</main><!-- /.container -->
<?php get_footer(); ?>