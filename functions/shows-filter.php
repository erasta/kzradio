<?php
function shows_filter_function(){
    $args = array(
        'orderby' => 'date',
        'order' => 'desc',
        'post_type' => 'show',
        'posts_per_page' => '10',
        'paged' => $paged,
    );
    if( $_POST ['showtypesfilter'] || $_POST ['djsfilter'] || $_POST ['showsfilter'] || $_POST['free_search'] )
        $pagination_args = array('filtered'=>'true');
    else
        $pagination_args = array();

    if( isset( $_REQUEST['showsfilter'] ) ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'shows',
                'field' => 'id',
                'terms' => $_REQUEST['showsfilter']
            )
        );
        if( $_POST['showsfilter'] && !($_GET['showsfilter']) ) {
            $pagination_args['showsfilter'] = $_POST['showsfilter'];
        }
    }


    if( isset( $_REQUEST['djsfilter'] ) ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'djs',
                'field' => 'id',
                'terms' => $_REQUEST['djsfilter']
            )
        );
        if( $_POST['djsfilter'] && !($_GET['djsfilter']) ) {
            $pagination_args['djsfilter'] = $_POST['djsfilter'];
        }
    }


    if( isset( $_REQUEST['showtypesfilter'] ) ) {
       $args['tax_query'] = array(
            array(
                'taxonomy' => 'show_type',
                'field' => 'id',
                'terms' => $_REQUEST['showtypesfilter']
            )
        );
        if( $_POST['showtypesfilter'] && !($_GET['showtypesfilter']) ) {
            $pagination_args['showtypesfilter'] = $_POST['showtypesfilter'];
        }
    }

    if( isset( $_REQUEST['showsfilter'] ) && isset( $_REQUEST['djsfilter'] ) ) {
        $args['tax_query'] = array(
        'relation' => 'AND',
            array(
                'taxonomy' => 'shows',
                'field' => 'id',
                'terms' => $_REQUEST['showsfilter']
            ),
            array(
                'taxonomy' => 'djs',
                'field' => 'id',
                'terms' => $_REQUEST['djsfilter']
            )
        );
        if( $_POST['showsfilter'] && !($_GET['showsfilter']) && $_POST['djsfilter'] && !($_GET['djsfilter']) ) {
            $pagination_args['showsfilter'] = $_POST['showsfilter'];
            $pagination_args['djsfilter'] = $_POST['djsfilter'];
        }
    }


    if( isset( $_REQUEST['showsfilter'] ) && isset( $_REQUEST['showtypesfilter'] ) ) {
        $args['tax_query'] = array(
        'relation' => 'AND',
            array(
                'taxonomy' => 'shows',
                'field' => 'id',
                'terms' => $_REQUEST['showsfilter']
            ),
            array(
                'taxonomy' => 'show_type',
                'field' => 'id',
                'terms' => $_REQUEST['showtypesfilter']
            )
        );

        if( $_POST['showsfilter'] && !($_GET['showsfilter']) && $_POST['showtypesfilter'] && !($_GET['showtypesfilter']) ) {
            $pagination_args['showsfilter'] = $_POST['showsfilter'];
            $pagination_args['showtypesfilter'] = $_POST['showtypesfilter'];
        }
    }


    if( isset( $_REQUEST['showtypesfilter'] ) && isset( $_REQUEST['djsfilter'] ) ) {
        $args['tax_query'] = array(
        'relation' => 'AND',
            array(
                'taxonomy' => 'show_type',
                'field' => 'id',
                'terms' => $_REQUEST['showtypesfilter']
            ),
            array(
                'taxonomy' => 'djs',
                'field' => 'id',
                'terms' => $_REQUEST['djsfilter']
            )
        );

        if( $_POST['djsfilter'] && !($_GET['djsfilter']) && $_POST['showtypesfilter'] && !($_GET['showtypesfilter']) ) {
            $pagination_args['djsfilter'] = $_POST['djsfilter'];
            $pagination_args['showtypesfilter'] = $_POST['showtypesfilter'];
        }
    }


    if( isset( $_REQUEST['showsfilter'] ) && isset( $_REQUEST['showtypesfilter'] ) && isset( $_REQUEST['djsfilter'] ) ) {
        $args['tax_query'] = array(
        'relation' => 'AND',
            array(
                'taxonomy' => 'shows',
                'field' => 'id',
                'terms' => $_REQUEST['showsfilter']
            ),
            array(
                'taxonomy' => 'show_type',
                'field' => 'id',
                'terms' => $_REQUEST['showtypesfilter']
            ),
            array(
                'taxonomy' => 'djs',
                'field' => 'id',
                'terms' => $_REQUEST['djsfilter']
            )
        );

        if( $_POST['djsfilter'] && !($_GET['djsfilter']) && $_POST['showtypesfilter'] && !($_GET['showtypesfilter']) && $_POST['showsfilter'] && !($_GET['showsfilter']) && $_POST['free_search'] && !($_GET['free_search']) ) {
            $pagination_args['djsfilter'] = $_POST['djsfilter'];
            $pagination_args['showtypesfilter'] = $_POST['showtypesfilter'];
            $pagination_args['showsfilter'] = $_POST['showsfilter'];
			// $pagination_args['free_search'] = $_POST['free_search'];
        }
    }



    if( isset( $_REQUEST['free_search'] ) ) {
        $args['s'] = $_REQUEST['free_search'];
        // $args['tax_query'] = array(
        //     'relation' => 'OR',
        //     array(
        //         'taxonomy' => array('shows', 'show_type','djs'),
        //         'name__like' => $_REQUEST['free_search']
        //     ),
        // );
        if( $_POST['free_search'] && !($_GET['free_search']) ) {
            $pagination_args['free_search'] = urlencode($_REQUEST['free_search']);
        }
    }

    if( get_query_var( 'paged' ) > 1 ) {
        $args['offset'] = 1 + ((get_query_var( 'paged' )-1) * 10);
    }

    $query = new WP_Query( $args );
    if( $query->have_posts() ) :
        echo '<div class="on-demand-items">';
            while( $query->have_posts() ): $query->the_post();

                get_template_part('loops/show');

            endwhile;
        wp_reset_postdata();
        echo '</div>';
        ?>
        <div class="kz-pagination func">
            <?php

                $kzPaginationArgs = array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $query->max_num_pages,
                    'current'      => max( 1, get_query_var( 'paged' ) ),
                    'format'       => '/page/%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'end_size'     => 2,
                    'mid_size'     => 1,
                    'prev_next'    => true,
					'prev_text'    => sprintf( '&Lt;'  ),
					'next_text'    => sprintf( '&Gt;' ),
                    'add_fragment' => '',
                );

                if( $_POST ['showtypesfilter'] || $_POST ['djsfilter'] || $_POST ['showsfilter'] || $_POST['free_search'] ) {
                    $kzPaginationArgs['add_args'] = $pagination_args;
                }

                echo paginate_links($kzPaginationArgs);

            ?>
        </div>
    <?php
    else :
        echo '<div class="results no-results">לא נמצאו תוצאות<br>כדאי לאפס את הטופס ולחפש מחדש :)</div>';
    endif;
    //echo '-';
   // die();
}


//add_action('wp_ajax_showsfilter', 'shows_filter_function');
//add_action('wp_ajax_nopriv_showsfilter', 'shows_filter_function');
?>