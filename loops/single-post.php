<?php
/*
The Single Post
===============
*/
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article role="article" id="post_<?php the_ID() ?>" <?php post_class('single-post-container') ?>>
			<?php if (has_post_thumbnail()) :
				$thumbnail = get_the_post_thumbnail_url();
			else :
				$thumbnail = "/wp-content/uploads/2018/11/pexels-photo-744318.jpeg";
			endif; ?>
			<header style="background-image: url('<?php echo $thumbnail; ?>');">
				<div class="blog-post-titles">
					<h1><?php the_title(); ?></h1>
					<?php if(get_the_ID() != 22402): ?>
						<?php if (get_field('multiple_authors')):
							$authors = get_field("authors"); $authors_string = '';
    							foreach( $authors as $author ):
								$user = $author['author'];
					        		$authors_string .= '<span>'. $user->display_name .'</span>, ';
					    		endforeach;
							$authors_string = substr($authors_string, 0, -2);
							echo '<h2>'.$authors_string.'</h2>';
						else: ?>
						<h2><?php the_author(); ?></h2>
						<?php endif; ?>
					<?php endif; ?>
					<small><?php (get_the_post_thumbnail_caption() != '') ? the_post_thumbnail_caption() : ''; ?></small>
				</div>
			</header>
			<main>
				<?php if (get_the_ID() == 17449) { ?>
					<div class="on-demand-and-video" style="padding-top: 80px;">
						<div class="on-demand">
							<div class="on-demand-items">
								<div id="post_17499" class="od-item center-bg" style="background-image: url('https://www.kzradio.net/wp-content/uploads/2019/12/KZRadio-Decade-Coverphoto-2-1110x423.png');">
									<span class="data od-show-time"><span class="show-date">30.12.2019</span></span>
									<div class="od-details"><a class="data od-show-dj" href="https://www.kzradio.net/djs/eyal-goldman">אייל גולדמן</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/assaf-ben-kereth">אסף בן קרת</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/dror-zamir">דרור זמיר</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/michal-rozenthal">מיכל רוזנטל</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/elpeleg_kadisahay">נעמי אל-פלג ואורי קדישאי</a>

										<span class="data od-title">
											<a href="https://www.kzradio.net/shows/decade-chart/17499">מצעד העשור האלטרנטיבי של העשר'ז – חלק 1</a>
										</span>
										<br>
										<span class="show-name-wrapper">
											<span class="data od-show-name">
												<a href="https://www.kzradio.net/shows/decade-chart">
													מצעד העשור </a>
											</span>
											
										</span>
										<span class="play" role="button" tabindex="0" onclick="javascript:loadmp3('https://kzradio.podbean.com/mf/play/vsgii5/ALTERNATIVE_10S_CHART_OF_THE_DECADE_-_PART1_29_12_19.mp3','מצעד העשור האלטרנטיבי של העשרז – חלק 1', 'https://www.kzradio.net/wp-content/uploads/2019/12/KZRadio-Decade-Coverphoto-2-1110x423.png')">
											<img src="https://www.kzradio.net/wp-content/themes/kzradio/theme/images/play.svg" alt="Play" />
										</span>
									</div>
									<div class="tags"></div>
								</div>
								<div id="post_17498" class="od-item center-bg" style="background-image: url('https://www.kzradio.net/wp-content/uploads/2019/12/KZRadio-Decade-Coverphoto-2-1110x423.png');">
									<span class="data od-show-time"><span class="show-date">30.12.2019</span></span>
									<div class="od-details"><a class="data od-show-dj" href="https://www.kzradio.net/djs/bar-peleg">בר פלג</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/hila-shagan">הילה שגן</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/%d7%9c%d7%99%d7%a8%d7%95%d7%9f-%d7%aa%d7%90%d7%a0%d7%99">לירון תאני</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/adi-noy">עדי נוי</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/quami">קוואמי</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/tomer-cooper">תומר קופר</a>

										<span class="data od-title">
											<a href="https://www.kzradio.net/shows/decade-chart/17498">מצעד העשור האלטרנטיבי של העשר'ז – חלק 2</a>
										</span>
										<br>
										<span class="show-name-wrapper">
												<span class="data od-show-name">
													<a href="https://www.kzradio.net/shows/decade-chart">
														מצעד העשור </a>
												</span></span>
												<span class="play" role="button" tabindex="0" onclick="javascript:loadmp3('https://kzradio.podbean.com/mf/play/2rgg9b/ALTERNATIVE_10S_CHART_OF_THE_DECADE_-_PART2_29_12_19.mp3','מצעד העשור האלטרנטיבי של העשרז – חלק 2', 'https://www.kzradio.net/wp-content/uploads/2019/12/KZRadio-Decade-Coverphoto-2-1110x423.png')">
											<img src="https://www.kzradio.net/wp-content/themes/kzradio/theme/images/play.svg" alt="Play" />
										</span>
									</div>
									<div class="tags"></div>
								</div>
								<div id="post_17503" class="od-item center-bg" style="background-image: url('https://www.kzradio.net/wp-content/uploads/2019/12/KZRadio-Decade-Coverphoto-2-1110x423.png');">
									<span class="data od-show-time"><span class="show-date">30.12.2019</span></span>
									<div class="od-details"><a class="data od-show-dj" href="https://www.kzradio.net/djs/amir-ascher">אמיר אשר</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/hadar-zilberstein">הדר זילברשטיין</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/maya-alkulumbre">מאיה אלקולומברה</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/nitzan-nahumzon">ניצן נחומזון</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/saar-gamzo">סער גמזו</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/roni-fialkow">רוני פיאלקוב</a>

										<span class="data od-title">
											<a href="https://www.kzradio.net/shows/decade-chart/17503">מצעד העשור האלטרנטיבי של העשר'ז – חלק 3</a>
										</span>
										<br>
										<span class="show-name-wrapper">
												<span class="data od-show-name">
													<a href="https://www.kzradio.net/shows/decade-chart">
														מצעד העשור </a>
												</span></span>
										<span class="play" role="button" tabindex="0" onclick="javascript:loadmp3('https://kzradio.podbean.com/mf/play/53gfqe/ALTERNATIVE_10S_CHART_OF_THE_DECADE_-_PART3_29_12_19.mp3','מצעד העשור האלטרנטיבי של העשרז – חלק 3', 'https://www.kzradio.net/wp-content/uploads/2019/12/KZRadio-Decade-Coverphoto-2-1110x423.png')">
											<img src="https://www.kzradio.net/wp-content/themes/kzradio/theme/images/play.svg" alt="Play" />
										</span>

									</div>
									<div class="tags"></div>
								</div>
								<div id="post_17505" class="od-item center-bg" style="background-image: url('https://www.kzradio.net/wp-content/uploads/2019/12/KZRadio-Decade-Coverphoto-2-1110x423.png');">
									<span class="data od-show-time"><span class="show-date">30.12.2019</span></span>
									<div class="od-details"><a class="data od-show-dj" href="https://www.kzradio.net/djs/ortal-nitzahon">אורטל ניצחון</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/uri-zer-aviv">אורי זר אביב</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/noa-argov">נועה ארגוב</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/tomer-kariv">תומר קריב</a>

										<span class="data od-title">
											<a href="https://www.kzradio.net/shows/decade-chart/17505">מצעד העשור האלטרנטיבי של העשר'ז – חלק 4</a>
										</span>
										<br>
										<span class="show-name-wrapper">
												<span class="data od-show-name">
													<a href="https://www.kzradio.net/shows/decade-chart">
														מצעד העשור </a>
												</span></span>
										<span class="play" role="button" tabindex="0" onclick="javascript:loadmp3('https://kzradio.podbean.com/mf/play/5pv5zf/ALTERNATIVE_10S_CHART_OF_THE_DECADE_-_PART4_29_12_19.mp3','מצעד העשור האלטרנטיבי של העשרז – חלק 4', 'https://www.kzradio.net/wp-content/uploads/2019/12/KZRadio-Decade-Coverphoto-2-1110x423.png')">
											<img src="https://www.kzradio.net/wp-content/themes/kzradio/theme/images/play.svg" alt="Play" />
										</span>

									</div>
									<div class="tags"></div>
								</div>
								<div id="post_17508" class="od-item center-bg" style="background-image: url('https://www.kzradio.net/wp-content/uploads/2019/12/KZRadio-Decade-Coverphoto-2-1110x423.png');">
									<span class="data od-show-time"><span class="show-date">30.12.2019</span></span>
									<div class="od-details"><a class="data od-show-dj" href="https://www.kzradio.net/djs/leon-feldman">לאון פלדמן</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/nadav-ravid">נדב רביד</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/quami">קוואמי</a>

										<span class="data od-title">
											<a href="https://www.kzradio.net/shows/decade-chart/17508">מצעד העשור האלטרנטיבי של העשר'ז – חלק 5 ואחרון</a>
										</span>
										<br>
										<span class="show-name-wrapper">
												<span class="data od-show-name">
													<a href="https://www.kzradio.net/shows/decade-chart">
														מצעד העשור </a>
												</span></span>
										<span class="play" role="button" tabindex="0" onclick="javascript:loadmp3('https://kzradio.podbean.com/mf/play/8s54aw/ALTERNATIVE_10S_CHART_OF_THE_DECADE_-_PART5_29_12_19.mp3','מצעד העשור האלטרנטיבי של העשרז – חלק 5 ואחרון', 'https://www.kzradio.net/wp-content/uploads/2019/12/KZRadio-Decade-Coverphoto-2-1110x423.png')">
											<img src="https://www.kzradio.net/wp-content/themes/kzradio/theme/images/play.svg" alt="Play" />
										</span>

									</div>
									<div class="tags"></div>
								</div>
								<div id="post_17531" class="od-item center-bg" style="background-image: url('https://www.kzradio.net/wp-content/uploads/2019/12/KZRadio-Decade-Coverphoto-2-1110x423.png');">
									<span class="data od-show-time"><span class="show-date">1.1.2020</span></span>
									<div class="od-details"><a class="data od-show-dj" href="https://www.kzradio.net/djs/itamar">איתמר ברנשטיין</a>
										<a class="data od-show-dj" href="https://www.kzradio.net/djs/chen-litvak">חן ליטבק</a>

										<span class="data od-title">
											<a href="https://www.kzradio.net/shows/decade-chart/17531">מצעד העשור האלטרנטיבי של העשר'ז – הזווית המקומית</a>
										</span>
										<br>
										<span class="show-name-wrapper">
												<span class="data od-show-name">
													<a href="https://www.kzradio.net/shows/decade-chart">
														מצעד העשור </a>
												</span></span>
										<span class="play" role="button" tabindex="0" onclick="javascript:loadmp3('https://kzradio.podbean.com/mf/play/dgqzk9/kzrecorder_2020-01-01_125959_MITZAD_ZAVIT_LOCAL.mp3','מצעד העשור האלטרנטיבי של העשרז – הזווית המקומית', 'https://www.kzradio.net/wp-content/uploads/2019/12/KZRadio-Decade-Coverphoto-2-1110x423.png')">
											<img src="https://www.kzradio.net/wp-content/themes/kzradio/theme/images/play.svg" alt="Play" />
										</span>


									</div>
									<div class="tags"><span class="data tag">
											<a href="https://www.kzradio.net/tag/%d7%90%d7%99%d7%aa%d7%9e%d7%a8-%d7%91%d7%a8%d7%a0%d7%a9%d7%98%d7%99%d7%99%d7%9f">איתמר ברנשטיין</a>
										</span>
										<span class="data tag">
											<a href="https://www.kzradio.net/tag/%d7%94%d7%96%d7%95%d7%95%d7%99%d7%aa-%d7%94%d7%9e%d7%a7%d7%95%d7%9e%d7%99%d7%aa">הזווית המקומית</a>
										</span>
										<span class="data tag">
											<a href="https://www.kzradio.net/tag/%d7%97%d7%9f-%d7%9c%d7%99%d7%98%d7%91%d7%a7">חן ליטבק</a>
										</span>
										<span class="data tag">
											<a href="https://www.kzradio.net/tag/%d7%9e%d7%99%d7%99%d7%93-%d7%90%d7%99%d7%9f-%d7%99%d7%96%d7%a8%d7%90%d7%9c">מייד אין יזראל</a>
										</span>
										<span class="data tag">
											<a href="https://www.kzradio.net/tag/%d7%9e%d7%a6%d7%a2%d7%93-%d7%94%d7%a2%d7%a9%d7%95%d7%a8">מצעד העשור</a>
										</span>
										<span class="data tag">
											<a href="https://www.kzradio.net/tag/%d7%a1%d7%99%d7%9b%d7%95%d7%9d-%d7%94%d7%a2%d7%a9%d7%95%d7%a8">סיכום העשור</a>
										</span></div>
								</div>
							</div>
						</div>
					</div>
					<style>
						#post_17449 .od-item .play {
							right: auto;
							left: 30px;
						}
						#post_17749 .od-title,
						#post_17749 .od-show-name {
							font-family: 'Rubik', arial, sans-serif;
						}
					</style>
				<?php } ?>
				<div class="single-post-content">
					<?php the_content(); ?>
				</div>
				<?php if(get_the_ID() == 22402){ ?>
					<div class="share-it" style="display: none;">
						<h3>רוצים לשתף?</h3>
						<!-- Sharingbutton Facebook -->
						<a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="noopener" aria-label="Share on Facebook">
						<div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
							</div>פייסבוק</div>
						</a>

						<!-- Sharingbutton Twitter -->
						<a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=ספר האקורדים האלטרנטיבי של תוכנית הרדיו נקודת חן&amp;url=<?php the_permalink(); ?>" target="_blank" rel="noopener" aria-label="Share on Twitter">
						<div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg>
							</div>טוויטר</div>
						</a>

						<!-- Sharingbutton WhatsApp -->
						<a class="resp-sharing-button__link" href="whatsapp://send?text=ספר האקורדים האלטרנטיבי של תוכנית הרדיו נקודת חן. <?php the_permalink(); ?>" target="_blank" rel="noopener" aria-label="Share on WhatsApp">
						<div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z"/></svg>
							</div>וואטסאפ</div>
						</a>

						<!-- Sharingbutton Telegram -->
						<a class="resp-sharing-button__link" href="https://telegram.me/share/url?text=ספר האקורדים האלטרנטיבי של תוכנית הרדיו נקודת חן&amp;url=<?php the_permalink(); ?>" target="_blank" rel="noopener" aria-label="Share on Telegram">
						<div class="resp-sharing-button resp-sharing-button--telegram resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M.707 8.475C.275 8.64 0 9.508 0 9.508s.284.867.718 1.03l5.09 1.897 1.986 6.38a1.102 1.102 0 0 0 1.75.527l2.96-2.41a.405.405 0 0 1 .494-.013l5.34 3.87a1.1 1.1 0 0 0 1.046.135 1.1 1.1 0 0 0 .682-.803l3.91-18.795A1.102 1.102 0 0 0 22.5.075L.706 8.475z"/></svg>
							</div>טלגרם</div>
						</a>
					</div>

					<?php if(have_rows('social_items')){ ?>
					<div class="social-wrapper">
						<h3><?php the_field('social_networks_title'); ?></h3>
						<?php while(have_rows('social_items')) { the_row(); ?>
							<a href="<?php the_sub_field('url'); ?>" class="social-icon" target="_blank">
								<img src="<?php the_sub_field('icon'); ?>" alt="">
							</a>

						<?php } ?>
					</div>
					<?php } ?>
				<?php } ?>
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
	endwhile;
else :
	get_template_part('loops/404');
endif;
?>