<?php get_header(); ?>
<?php
$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;
$thumbnail_id = get_field('show_image', $taxonomy . '_' . $term_id);
$thumbnail = wp_get_attachment_image_src($thumbnail_id ,'full')[0];
$thumbnail_position = get_field('show_image_position', $taxonomy . '_' . $term_id);
$backpos = $thumbnail_position ? ' background-position: 50% ' . $thumbnail_position . '%;' : ' background-position: 50% 50%;';
?>
<main id="show">
    <div class="row">
        <div id="content">
            <header id="show-header" style="background: url('<?php echo $thumbnail; ?>') no-repeat;<?php echo $backpos; ?> background-size: cover;  ">
            </header>
            <div class="flex-container show-title-container">
                <h1 class="showpage-title"><?php echo single_cat_title(); ?></h1>
            </div>
            <div class='shows-list' role="main">
                <div class='show-desc'>
                    <?php echo term_description( $term_id, $taxonomy ) ?>
                </div>
                <?php get_template_part('loops/shows-loop'); ?>
            </div>
        </div><!-- /#content -->
    </div><!-- /.row -->
</main><!-- /.container -->


<?php get_footer(); ?>