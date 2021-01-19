<?php
/**
 * Template Name: DJ
 */
get_header(); ?>
<?php
$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;
$thumbnail_id = get_field('dj_photo', $taxonomy . '_' . $term_id);
$thumbnail = wp_get_attachment_image_src( $thumbnail_id, 'full' );
$thumbnail_position = get_field('dj_photo_position', $taxonomy . '_' . $term_id);
$backpos = $thumbnail_position ? ' background-position: 50% ' . $thumbnail_position . '%;' : '';

$instagram = get_field('instagram', $taxonomy . '_' . $term_id);
$spotify = get_field('spotify', $taxonomy . '_' . $term_id);
$twitter = get_field('twitter', $taxonomy . '_' . $term_id);
$facebook = get_field('facebook', $taxonomy . '_' . $term_id);
$website = get_field('website', $taxonomy . '_' . $term_id);
$email = get_field('email', $taxonomy . '_' . $term_id);
?>
<main id="dj-wrapper" class="page-taxonomy-dj">
	<div class="row">
		<div id="content">
			<header id="dj-header" style="background-image: url('<?php echo $thumbnail[0]; ?>');<?php echo $backpos; ?>">
			</header>
			<div class="flex-container dj-title-container">
				<h1 class="dj-title"><?php echo single_cat_title(); ?></h1>
			</div>
			<div class='shows-list' role="main">
				<div class='dj-desc'>
					<?php echo term_description( $term_id, $taxonomy ) ?>
				</div>
				<div class="dj-social-links">
					<?php if ($instagram) { ?>
						<a href="<?php echo $instagram; ?>" target="_blank">
							<img src="../../wp-content/themes/kzradio/theme/images/social/instagram_white.png" alt="instagram">
						</a>
					<?php } ?>
					<?php if ($spotify) { ?>
						<a href="<?php echo $spotify; ?>" target="_blank">
							<img src="../../wp-content/themes/kzradio/theme/images/social/spotify_white.png" alt="spotify">
						</a>
					<?php } ?>
					<?php if ($twitter) { ?>
						<a href="<?php echo $twitter; ?>" target="_blank">
							<img src="../../wp-content/themes/kzradio/theme/images/social/twitter_white.png" alt="twitter">
						</a>
					<?php } ?>
					<?php if ($facebook) { ?>
						<a href="<?php echo $facebook; ?>" target="_blank">
							<img src="../../wp-content/themes/kzradio/theme/images/social/facebook_white.png" alt="facebook">
						</a>
					<?php } ?>
					<?php if ($website) { ?>
						<a href="<?php echo $website; ?>" target="_blank">
							<img src="../../wp-content/themes/kzradio/theme/images/social/globe_white.png" alt="email">
						</a>
					<?php } ?>
					<?php if ($email) { ?>
						<a href="mailto:<?php echo antispambot($email); ?>" target="_blank">
							<img src="../../wp-content/themes/kzradio/theme/images/social/envelope_white.png" alt="email">
						</a>
					<?php } ?>
				</div>
				<div class="on-demand-items container">
					<?php get_template_part('loops/shows-loop'); ?>
				</div>
			</div>
		</div><!-- /#content -->
		<?php get_sidebar(); ?>
	</div><!-- /.row -->
</main><!-- /.container -->


<?php get_footer(); ?>