<?php
/**
 * Template Name: Contact Us
 */

get_header();
?>

    <main id="main">
        <div id="content" role="main">
            <div class="container-fluid contact-us-wrapper" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>')">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>
                                <?php the_title(); ?> <!-- Page Title -->
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
							<?php while ( have_posts() ) : the_post(); ?> <!-- loop -->
								<div class="contact-us-content">
									<?php the_content(); ?> <!-- page content -->
								</div>
							<?php 
								endwhile; //end loop
    							wp_reset_query(); //resetting the page query
							?>
							
                        </div>
                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </main>
</div>
<?php get_footer(); ?>