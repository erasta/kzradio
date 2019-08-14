<?php

// custom query filter to search title custom fields from "free_search"
add_action( 'pre_get_posts', function( $q ) {
    if( $title = $q->get( '_meta_or_title' ) ) {
        add_filter( 'get_meta_sql', function( $sql ) use ( $title ) {
            global $wpdb;

            // Only run once:
            static $nr = 0; 
            if( 0 != $nr++ ) return $sql;

            // Modified WHERE
            $sql['where'] = sprintf(
                " AND ( %s OR %s ) ",
                $wpdb->prepare( "{$wpdb->posts}.post_title like '%%%s%%'", $title),
                mb_substr( $sql['where'], 5, mb_strlen( $sql['where'] ) )
            );

            return $sql;
        });
    }
});

function shows_filter_function(){
	// set args for the query
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
		$meta_query = array();
		$search_string = $_REQUEST['free_search'];

		$meta_query[] = array(
			'key' => 'show_playlist',
			'value' => $search_string,
			'compare' => 'LIKE'
		);

		//if there is more than one meta query 'or' them
		if(count($meta_query) > 1) {
			$meta_query['relation'] = 'OR';
		}

		// add args to query
		$args['_meta_or_title'] = $search_string; // see the filter on top of the file
		$args['meta_query'] = $meta_query;
		
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