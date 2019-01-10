<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<?php get_template_part('loops/show', get_post_format()); ?>
<?php endwhile; ?>
	<div class="kz-pagination">
        <?php
            echo paginate_links( array(
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                // 'total'        => $query->max_num_pages,
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
	else :
		get_template_part('loops/no-shows');
	endif;
?>