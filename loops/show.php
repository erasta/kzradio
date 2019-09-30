<?php
$tags = get_the_tags();
$id = get_the_ID();
$shows_term = wp_get_post_terms($post->ID, 'shows');
$djs_term = wp_get_post_terms($post->ID, 'djs');
if (has_post_thumbnail()){
	$thumbnail = get_the_post_thumbnail_url($id, 'large');
} else {
    $thumbnail_id = get_field('show_image', 'shows_'.$shows_term['0']->term_id);
    if ($thumbnail_id) {
        $thumbnail = wp_get_attachment_image_src($thumbnail_id ,'large')[0];
    } else {
        $thumbnail = get_template_directory_uri() . '/theme/images/show_placeholder.jpg';
    }
}
?>
    <div class="od-item center-bg" style="background-image: url('<?php echo $thumbnail; ?>');" id="post_<?php the_ID()?>">
        <a href="<?php the_permalink(); ?>" class="show-link"></a>
        <span class="data od-show-time"><span class="show-date"><?php echo get_the_date('j.n.Y'); ?></span></span>
        <div class="od-details">
            <?php foreach ($djs_term as $term) { ?>
                <a href="<?php echo get_term_link( $term ) ?>" class="data od-show-dj"><?php echo $term->name; ?></a>
            <?php } ?>
            <br />
            <span class="data od-title" <?php if (strpbrk(get_the_title(), "אבגדהוזחטיכלמנסעפרקשתןםךףץ") == false) echo "style='direction: ltr'"; ?> >
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </span><br/>
            <span class="show-name-wrapper">
                <span class="data od-show-name">
                    <a href="<?php echo get_term_link($shows_term[0]); ?>">
                        <?php echo $shows_term[0]->name; ?>
                    </a>
                </span>

                <?php $s_link = get_field('stream_link');
					if ($s_link):
                        $title = get_the_title();
                        $p_title = str_replace("'", "", $title); ?>

                            <span class="play" role="button" tabindex="0" onclick="javascript:loadmp3('<?php echo $s_link; ?>','<?php echo $p_title; ?>', '<?php echo $thumbnail; ?>')">
                                <img src="<?php echo get_template_directory_uri(); ?>/theme/images/play.svg" alt="Play">
                            </span>
                <?php endif; ?>

            </span>
        </div>
         <div class="tags">
            <?php
                if ($tags):
                    foreach ($tags as $key => $value) { ?>
                        <span class="data tag">
                            <a href="<?php echo get_term_link($value->term_id); ?>"><?php echo $value -> name; ?></a>
                        </span>
                    <?php
                    }
                endif;
             ?>
        </div>
    </div>