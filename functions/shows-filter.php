<?php
function shows_filter_function(){
    $args = array(
        'orderby' => 'date',
        'order' => 'desc',
        'post_type' => 'show',
    );

    if( isset( $_POST['showsfilter'] ) )
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'shows',
                'field' => 'id',
                'terms' => $_POST['showsfilter']
            )
        );

    if( isset( $_POST['djsfilter'] ) )
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'djs',
                'field' => 'id',
                'terms' => $_POST['djsfilter']
            )
        );

    if( isset( $_POST['showtypesfilter'] ) )
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'show_type',
                'field' => 'id',
                'terms' => $_POST['showtypesfilter']
            )
        );
	
	if( isset( $_POST['showsfilter'] ) && isset( $_POST['djsfilter'] ) )
        $args['tax_query'] = array(
		'relation' => 'AND',
			array(
                'taxonomy' => 'shows',
                'field' => 'id',
                'terms' => $_POST['showsfilter']
            ),
			array(
                'taxonomy' => 'djs',
                'field' => 'id',
                'terms' => $_POST['djsfilter']
            )
		);
	
	if( isset( $_POST['showsfilter'] ) && isset( $_POST['showtypesfilter'] ) )
        $args['tax_query'] = array(
		'relation' => 'AND',
			array(
                'taxonomy' => 'shows',
                'field' => 'id',
                'terms' => $_POST['showsfilter']
            ),
			array(
                'taxonomy' => 'show_type',
                'field' => 'id',
                'terms' => $_POST['showtypesfilter']
            )
		);
	
	if( isset( $_POST['showtypesfilter'] ) && isset( $_POST['djsfilter'] ) )
        $args['tax_query'] = array(
		'relation' => 'AND',
			array(
				'taxonomy' => 'show_type',
				'field' => 'id',
				'terms' => $_POST['showtypesfilter']
			),
			array(
                'taxonomy' => 'djs',
                'field' => 'id',
                'terms' => $_POST['djsfilter']
            )
		);
	
	if( isset( $_POST['showsfilter'] ) && isset( $_POST['showtypesfilter'] ) && isset( $_POST['djsfilter'] ) )
        $args['tax_query'] = array(
		'relation' => 'AND',
			array(
                'taxonomy' => 'shows',
                'field' => 'id',
                'terms' => $_POST['showsfilter']
            ),
			array(
				'taxonomy' => 'show_type',
				'field' => 'id',
				'terms' => $_POST['showtypesfilter']
			),
			array(
                'taxonomy' => 'djs',
                'field' => 'id',
                'terms' => $_POST['djsfilter']
            )
		);

	
	if( isset( $_POST['free_search'] ) )
		$args['s'] = $_POST['free_search'];


    $query = new WP_Query( $args );

    if( $query->have_posts() ) :
        echo '<div class="on-demand-items">';
			while( $query->have_posts() ): $query->the_post();

				get_template_part('loops/show');

			endwhile;
		wp_reset_postdata();
		echo '</div>';
    else :
        echo '<div class="results no-results">לא נמצאו תוצאות<br>כדאי לאפס את הטופס ולחפש מחדש :)</div>';
    endif;

    die();
}


add_action('wp_ajax_showsfilter', 'shows_filter_function');
add_action('wp_ajax_nopriv_showsfilter', 'shows_filter_function');
