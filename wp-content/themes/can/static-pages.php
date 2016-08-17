<?php
/*
  Template Name: Static Pages
 */
get_header();

$truste = $wpdb->get_row($wpdb->prepare("SELECT id,image,external_link,title,image_alt_text FROM wp_badges WHERE id = %d", 1));
// Single page detail
while (have_posts()) : the_post();
    ?>
    <!--Financial Products -->
    <section id="page-not-found">
        <div class="container voffset5">
             <div class="row">
                <div class="col-sm-12">
                     <h2>CAN Capital's <?php the_title(); ?> 
                         <?php 
                        if ( isset($truste) && $post->post_name != 'legal-disclaimers' && $post->post_name != 'terms-of-use' ) {
                            ?>
                             <a title="<?php echo $truste->title; ?>" href="<?php echo $truste->external_link; ?>" class="pull-right hidden-xs" target="_blank"> 
                                 <img alt="<?php echo $truste->image_alt_text; ?>" src="<?php echo $truste->image; ?>"></a>     
                            <?php
                        } ?>
                     </h2>
                </div>
                <div class="col-sm-12">
                    <div class="lighter-blue">
                        <p>
                            <b>Last Revised: <?php the_modified_date('F j, Y'); ?></b>
                        </p>
                    </div>
                </div>
                    <div class="col-sm-12" id="content-based-pages">
                      <?php the_content(); ?>
                    </div>                      
            </div>
    </section>
<?php endwhile; ?>
<?php get_footer(); ?>