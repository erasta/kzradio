<?php
/**
 * Template Name: 2010s
 * The template for displaying all posts.
 */

get_header();
?>

<main class="container" id="main">
	<div class="row">
		<div id="content" class="decade-chart" role="main">
            <div class="intro-strip clearfix" style="background-image: url(https://www.kzradio.net/wp-content/uploads/2019/12/bg1_1.jpg);">
                <h1 class="page-title">
                    <img src="<?php echo get_template_directory_uri(); ?>/theme/images/kz-walla-title2.png" width="717" height="128" alt="מצעד העשור האלטרנטיבי של רדיו הקצה ווואלה! תרבות">
                </h1>
                <div class="textual-content">
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    <a href="https://kzradio.walla.co.il/" class="kz-red-btn" target="_blank">הצבעה באתר וואלה!</a>
                </div>
            </div><!--.intro-strip--> 

            <div class="lists-strip clearfix">
                <div class="list-col">
                    <?php /* <h3 class="col-title"><a href="https://glz.co.il/%D7%92%D7%9C%D7%92%D7%9C%D7%A6/%D7%AA%D7%95%D7%9B%D7%A0%D7%99%D7%95%D7%AA/%D7%A7%D7%95%D7%95%D7%90%D7%9E%D7%99" target="_blank" class="underline">לכל פרקי סדרת סיכום העשור של קוואמי בגלגלצ</a></h3>*/ ?>
                    <?php if(have_rows('quamis_summaries')) { ?>
                        <?php /*<ul>
                            <?php while(have_rows('quamis_summaries')){ the_row(); ?>
                                <li><a href="<?php the_sub_field('show_url'); ?>" target="_blank"><?php the_sub_field('show_text'); ?></a></li>
                            <?php } ?>
                        </ul>*/ ?>
                        
                    <?php } ?>
                </div><!--.list-col-->
                
                <?php /* <div class="list-col">
                    <h3 class="col-title">שנות העשרה בקצה</h3>
                    <ul>
                        <?php while(have_rows('magazine_posts')){ the_row(); ?>
                            <li>
                                <div class="post-thumb"><?php echo get_the_post_thumbnail(get_sub_field('post'), 'thumbnail'); ?></div>
                                <a href="https://www.kzradio.net/decadenitzanpincu1/" target="_blank"><?php echo get_the_title(get_sub_field('post')); ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div><!--.list-col--> */ ?>
            </div><!--.lists-strip-->
            
            <div class="recommended-shows">
                <div class="recommended-wrapper">
                    <ul class="tabs">
                        <li class="active"><a href="#">שירי העשור - בספוטיפיי</a></li>    
                        <li class=""><a href="#">המצעדים השנתיים 2010-19</a></li>
                        <li class=""><a href="#">תוכניות סיכומי העשור</a></li>
                    </ul> 
                    <div class="shows-wrapper clearfix">
                        <?php if(have_rows('spotify_playlists')) { ?>
                            <div class="shows-content active" data-order="0">
                                <ul>
                                    <?php while(have_rows('spotify_playlists')){ the_row(); ?>
                                    <?php /*  <li><a href="<?php the_sub_field('playlist_url'); ?>" target="_blank"><?php the_sub_field('playlist_text'); ?></a></li>*/ ?>
                                        <li><?php the_sub_field('playlist_embed_code'); ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>

                        <div class="shows-content" data-order="1">
                            <div class="on-demand-items">
                                <?php
                                    $args = array( 'posts_per_page'=>-1, 'post_type'=>'show', 
                                    'tax_query' => array(
                                        array(
                                          'taxonomy' => 'shows',
                                          'field' => 'slug', 
                                          'terms' => 'chart'
                                        )
                                      )
                                    );
                                    $posts = get_posts( $args );
                                    foreach ($posts as $post) {

                                        get_template_part('loops/show');

                                    }
                                wp_reset_postdata(); ?>
                            </div><!--.on-demend-items-->
                           <?php /* <a href="https://www.kzradio.net/last-shows?filtered=true&showsfilter=559" class="more-shows">לכל המצעדים משנים קודמות</a> */ ?>
                        </div>

                        <div class="shows-content" data-order="2">
                            <div class="on-demand-items">
                                <?php
                                    $args = array( 'posts_per_page'=>-1, 'post_type'=>'show', 
                                    'tax_query' => array(
                                        array(
                                          'taxonomy' => 'show_type',
                                          'field' => 'slug', 
                                          'terms' => 'best-of-the-decade'
                                        )
                                      )
                                    );
                                    $posts = get_posts( $args );
                                    foreach ($posts as $post) {
                                        get_template_part('loops/show');
                                    }
                                wp_reset_postdata(); ?>
                            </div><!--.on-demend-items-->
                            <?php /* <a href="https://www.kzradio.net/last-shows?filtered=true&showtypesfilter=1210" class="more-shows">לכל תוכניות סיכומי העשור</a>*/ ?>
                        </div>
                    </div><!--.shows-wrapper-->
                </div><!--.recommended-wrapper-->

                <div class="decade-cta">
                    <div class="pre-btn">זהו? מוכנים?</div>
                    <a href="https://kzradio.walla.co.il/" class="kz-red-btn" target="_blank">יאללה לוואלה!</a>
                </div><!--.decade-cta-->
            </div><!--.recommended-shows-->
            <a href="#main" class="back-top-top" title="חזרה לראש העמוד"><img src="<?php echo get_template_directory_uri(); ?>/theme/images/back-to-top.png"></a>
        </div><!--#content.2010s-->
    </div><!--.row-->
</main>


<?php get_footer(); ?>