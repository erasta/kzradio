<?php get_header(); ?>
<main class="container">
	<div class="row">
		<div id="content" role="main">
			<main id="main" class="magazine">
				<div class="container-fluid">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h1><?php 
								echo '<span>קטגוריה: </span>'; 
								echo single_cat_title(); 
								?></h1>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
							<?php
								$category = get_queried_object();
								
								$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
								$args = array(
									'post_type' => 'post',
									'post_status' => 'publish',
									'orderby' => 'date',
									'order' => 'desc',
									'posts_per_page' => '27',
									'cat' => $category->term_id,
									'paged' => $paged
								);
								$query = new WP_Query( $args );
								if ( $query->have_posts() ) {
									echo '<div class="magazine-items-wrapper">';
										while ( $query->have_posts() ) {
											$query->the_post(); ?>
											<div class="magazine-item">
												<div class="img-wrapper">
													<a href="<?php the_permalink(); ?>">
														<?php the_post_thumbnail('magazine_lobby');?>
													</a>
													<?php $categories = get_the_category();
	
													if ( ! empty( $categories ) ) {
														echo '<div class="items-cat">';
															echo '<a href="'.get_category_link($categories[0]->term_id).'" class="item-cat">'.esc_html( $categories[0]->name ).'</a>';
															if($categories[1]->name != '') echo '<a href="'.get_category_link($categories[1]->term_id).'" class="item-cat">'.esc_html( $categories[1]->name ).'</a>';
														echo '</div>';
													}?>
												</div>
												<div class="item-content-wrapper">
													<h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
													<div class="item-excerpt">
														<?php the_excerpt(); ?>
													</div>
													<div class="item-details">
														<div class="item-author"><?php the_author(); ?></div>
														<div class="item-date"><?php echo get_the_date(); ?></div>
													</div>
												</div>
											</div>
										<?php }
									echo '</div>';
									wp_reset_query();
								}?>
								
							</div>
						</div>
					</div>
				</div>
				<?php //get_sidebar(); ?>
			</main>
		</div>
	</div><!-- /.row -->
</main><!-- /.container -->
<?php get_footer(); ?>