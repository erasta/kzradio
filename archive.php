<?php
/**
 * Archive Template
 */

get_header();
?>

<main id="main">
    <div id="content" role="main">
        <div class="container-fluid shows shows-wrapper" style="background-image: url('https://www.kzradio.net/wp-content/uploads/2018/11/ondemand-bg.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if ( have_posts() ) : ?>
                            <h1 class="shows-main-title">
                                <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
                            </h1>
                            <div class="shows-subtitle">
                                <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <form action="<?php echo site_url(); ?>/" method="post" >
                            <div class="text-row">
                                <input id="textsearch" type="text" name="free_search" placeholder="חיפוש חופשי" />
                            </div>
                            <div class="select-row row justify-content-center col-sm-12 col-md-10 offset-md-1">

                                <div class="col-sm-12 col-md-4" style="text-align: center;">
                                    <?php
                                    $show_types = get_terms( array(
                                        'taxonomy' => 'show_type',
                                        'hide_empty' => false
                                    ));
                                        if( $show_types ) :
                                            echo '<select name="showtypesfilter"><option disabled selected value>סוג התוכנית:</option>';
                                            foreach ( $show_types as $show_type ) :
                                                echo '<option value="' . $show_type->term_id . '">' . $show_type->name . '</option>';
                                            endforeach;
                                            echo '</select>';
                                        endif;
                                    ?>
                                </div>

                                <div class="col-sm-12 col-md-4" style="text-align: center;">
                                    <?php
                                    $shows = get_terms( array(
                                        'taxonomy' => 'shows',
                                        'hide_empty' => false
                                    ));
                                        if( $shows) :
                                            echo '<select name="showsfilter"><option disabled selected value>שם התוכנית:</option>';
                                            foreach ( $shows as $show ) :
                                                echo '<option value="' . $show->term_id . '">' . $show->name . '</option>';
                                            endforeach;
                                            echo '</select>';
                                        endif;
                                    ?>
                                </div>

                                <div class="col-sm-12 col-md-4" style="text-align: center;">
                                    <?php
                                    $djs = get_terms( array(
                                        'taxonomy' => 'djs',
                                        'hide_empty' => false
                                    ));
                                        if( $djs) :
                                            echo '<select name="djsfilter"><option disabled selected value>שם השדרן:</option>';
                                            foreach ( $djs as $dj ) :
                                                echo '<option value="' . $dj->term_id . '">' . $dj->name . '</option>';
                                            endforeach;
                                            echo '</select>';
                                        endif;
                                    ?>
                                </div>


                            </div>
                            <div class="buttons-wrapper row justify-content-center">
                                <button class="search">זיקוק</button>
                            </div>
                            <div class="buttons-wrapper row justify-content-center">
                                <input type="reset" value="איפוס">
                                <!--<input type="hidden" name="action" value="showsfilter">-->
                            </div>
                        </form>
                        <div id="response">
                            <?php
                            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                            if( isset( $_POST['showsfilter']) || isset( $_POST['djsfilter']) || isset( $_POST['showtypesfilter'] ) ) {
                                shows_filter_function();
                                wp_reset_postdata();
                            } elseif ( is_category() || is_tag() ) {
                                get_template_part( 'loops/shows-loop' );

                            } else {
                                $args = array(
                                    'orderby' => 'date',
                                    'order' => 'desc',
                                    'post_type' => 'show',
                                    'posts_per_page' => '10',
                                    'paged' => $paged
                                );
                                $query = new WP_Query( $args );

                                if( $query->have_posts() ) :
                                    echo '<div class="on-demand-items">';
                                    while( $query->have_posts() ): $query->the_post();

                                        get_template_part('loops/show');

                                    endwhile;
                                    ?>
                                    <div class="kz-pagination">
                                        <?php
                                            echo paginate_links( array(
                                                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                                'total'        => $query->max_num_pages,
                                                'current'      => max( 1, get_query_var( 'paged' ) ),
                                                'format'       => '?paged=%#%',
                                                'show_all'     => false,
                                                'type'         => 'plain',
                                                'end_size'     => 2,
                                                'mid_size'     => 1,
                                                'prev_next'    => true,
                                                'prev_text'    => sprintf( ''  ),
                                                'next_text'    => sprintf( '' ),
                                                'add_args'     => false,
                                                'add_fragment' => '',
                                            ) );
                                        ?>
                                    </div>
                                    <?php
                                    wp_reset_postdata();
                                    echo '</div>';
                                endif;
                            }?>
                        </div>
                        <script>
                            jQuery(document).ready(function () {
                                jQuery('#shows-filter').submit(function(e){
                                    e.stopPropagation();
                                    e.preventDefault();
                                    var filter = jQuery('#shows-filter');
                                    jQuery.ajax({
                                        url:filter.attr('action'),
                                        data:filter.serialize(), // form data
                                        type:filter.attr('method'), // POST
                                        beforeSend:function(xhr){
                                            filter.find('button').text('מחפש...'); // changing the button label
                                        },
                                        success:function(data){
                                            filter.find('button').text('חפש'); // changing the button label back
                                            var result = jQuery(data).find('#response').html();
                                            console.log( result + '****' );
                                            jQuery('#response').html(result);
                                        }
                                    });
                                    return false;
                                });
                                jQuery('#shows-filter').change(function() {
                                    jQuery('button.search').addClass('cta');
                                });
                                jQuery('input[type=reset]').click(function() {
                                    jQuery('button.search').removeClass('cta');
                                    setTimeout(function() {
                                        jQuery('#shows-filter').submit();
                                    }, 100);
                                })
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>