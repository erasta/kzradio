<?php
/**
 * Template Name: DJs
 * The template for displaying ALL DJs in a list.
 */

get_header();
?>

    <main id="main">
        <div id="content" role="main">
            <div class="container-fluid all-djs all-djs-wrapper" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="all-djs-main-title">
                                <?php the_title(); ?>
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="broadcasters">
                                <div class="wrapper">
                                    <?php
                                        $djs = get_terms( array(
                                            'taxonomy' => 'djs',
                                            'hide_empty' => false
                                        ));
                                        shuffle( $djs );
                                    ?>
                                    <ul class="items">

                                        <?php foreach ( $djs as $dj ) {
                                            $dj_link = get_term_link($dj);
                                        ?>
                                            <li class="item">
                                                <a href="<?php echo esc_url($dj_link); ?>">			
													<?php $dj_img_id = get_field('dj_photo', $dj);
													$dj_img = wp_get_attachment_image( $dj_img_id, 'dj_img', ''); 
													echo $dj_img; ?>
                                                    <span class="dj-name"><?php echo $dj->name; ?></span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul><!--.items-->
                                </div><!--.wrapper-->
                            </div><!--.broadcasters-->
                        </div>
                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </main>
</div>
<?php get_footer(); ?>