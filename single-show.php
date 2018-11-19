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
				<article role="article" id="post_<?php the_ID()?>" <?php post_class('episode-container');?>>
					<?php
						$show = wp_get_post_terms($post->ID, 'shows');
                        $djs_term = wp_get_post_terms($post->ID, 'djs');
						if (has_post_thumbnail()) {
							$thumbnail = get_the_post_thumbnail_url();
						} else {
							$thumbnail = wp_get_attachment_image_src(get_field('show_image', 'shows_'.$show['0']->term_id), 'full')[0];
						}
                        $thumbnail_position = get_field('show_image_position', 'shows_'.$show['0']->term_id);
                        $backpos = $thumbnail_position ? ' background-position: 50% ' . $thumbnail_position . '%;' : '';
					?>
					<header id="episode-header" class="center-bg" style="background-image: url('<?php echo $thumbnail; ?>');<?php echo $backpos; ?>">
						<div id="episode-meta">
                            <div class="episode-dj-title">
                                <?php foreach ($djs_term as $term) { ?>
                                    <span><a href="<?php echo get_term_link( $term ) ?>" class="data od-show-dj"><?php echo $term->name; ?></a></span>
                                <?php } ?>
                            </div>
                            <h1 class="episode-show-title">
                                <span>
									<a href="<?php echo get_term_link( $show['0']->term_id ); ?>">
										<?php echo $show['0']->name; ?>
									</a>
                                </span>
                            </h1>
							<h2 class="episode-title">
                                <span><?php the_title(); ?></span>
                            </h2>
                        </div>
					</header>
					<main>
						<div class="episode-content">
							<?php
								$title = get_the_title();
								$p_title = str_replace("'", "", $title);
							?>
                            <a class="play-show" href="javascript:loadmp3('<?php the_field('stream_link'); ?>','<?php echo $p_title; ?>', '<?php echo $thumbnail; ?>')">
                                <img src="<?php echo get_template_directory_uri(); ?>/uploads/play.png" />
                            </a>

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
                            <div class="episode-playlist">פלייליסט</div>
							<?php
								$playlist = get_field('show_playlist');
								if ($playlist) {
							?>
									<div class="playlist">
										<?php the_field('show_playlist'); ?>
									</div>
							<?php
								} else {
							?>
									<div class="no-playlist">
										הפלייליסט לתכנית זו תפורסם בקרוב...
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