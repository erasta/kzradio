<?php get_header(); ?>
<main class="container-fluid no-padding">
    <div class="row">
        <div id="content" role="main">
            <?php if(have_posts()): while(have_posts()): the_post(); ?>

                <article role="article" id="post_<?php the_ID()?>" <?php post_class('single-show-container');?>>
                    <?php
                        $show = wp_get_post_terms($post->ID, 'shows');
                        if (has_post_thumbnail()) {
                            echo 'thumbnail';
                            $thumbnail = get_the_post_thumbnail_url();
                        } else {
                            echo 'attach';
                            $thumbnail = wp_get_attachment_image_src(get_field('show_image', 'shows_'.$show['0']->term_id), 'full')[0];
                        }
                    ?>
                    <header id="show-header" class="center-bg" style="background-image: url('<?php echo $thumbnail; ?>');">
                        <div id="show-meta">
                            <h1><?php the_title(); ?></h1>
                            <span class="data od-title">
                                <h2>
                                    <a href="<?php echo get_term_link( $show['0']->term_id ); ?>">
                                        <?php echo $show['0']->name; ?>
                                    </a>
                                </h2>
                            </span>
                        </div>
                    </header>
                    <main>
                        <div class="show-content">
                            <?php $title = get_the_title();
                            $p_title = str_replace("'", "", $title); ?>
                            <a class="play-show" href="javascript:loadmp3('<?php the_field('stream_link'); ?>','<?php echo $p_title; ?>')">
                                <img src="<?php echo get_template_directory_uri(); ?>/uploads/play.png" />
                            </a>
                            <?php the_content(); ?>
                            <div class="show-tags">
                            <?php
                                $tags = get_the_tags();
                                if ($tags):
                                    foreach ($tags as $key => $value): ?>
                                        <a class="show-tag" href="/tags/<?php echo $value -> slug ?>">
                                        <?php echo $value -> name; ?>
                                        </a>
                                    <?php
                                    endforeach;
                                endif;
                             ?>
                            </div>
                            <div class="playlist">
                                <?php the_field('show_playlist'); ?>
                            </div>
                        </div>
                    </main>
                </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div><!-- /#content -->
    </div><!-- /.row -->
</main><!-- /.container -->
<?php get_footer(); ?>