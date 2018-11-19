<?php 
$tags = get_the_tags();
$id = get_the_ID();
$shows_term = wp_get_post_terms($post->ID, 'shows');
$djs_term = wp_get_post_terms($post->ID, 'djs');
if (has_post_thumbnail()){
    $thumbnail = get_the_post_thumbnail_url($id, 'large');
} else {
    $thumbnail_id = get_field('show_image', 'shows_'.$shows_term['0']->term_id);
	$thumbnail = wp_get_attachment_image_src($thumbnail_id ,'full')[0];
}?>

    <div class="od-item center-bg" style="background-image: url('<?php echo $thumbnail; ?>');" id="post_<?php the_ID()?>">
		<a href="<?php the_permalink(); ?>" class="show-link"></a>
		<span class="data od-show-time"><span class="show-date"><?php echo get_the_date('j.n.Y // H:m'); ?></span></span>
        <div class="od-details">
            <?php foreach ($djs_term as $term) { ?>
                <a href="<?php echo get_term_link( $term ) ?>" class="data od-show-dj"><?php echo $term->name; ?></a>
            <?php } ?>
            <br />
			<span class="data od-title">
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

							<span class="play" role="button" tabindex="0" onclick="javascript:loadmp3('<?php echo $s_link; ?>','<?php echo $p_title; ?>')">
								<img src="<?php echo get_template_directory_uri(); ?>/theme/images/play.svg" alt="Play">
							</span>
				<?php endif; ?>
				
			</span>
        </div>
         <div class="tags">
            <?php
                if ($tags):
                    foreach ($tags as $key => $value) { ?>
                        <!--<a class="data tag" href="/tag/<?php // echo $value -> slug ?>">-->
						<a class="data tag" href="#">
                        <?php echo $value -> name; ?>
                        </a>
                    <?php
                    }
                endif;
             ?>
        </div>
    </div>