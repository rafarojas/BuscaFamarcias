<?php
get_header();

// Include resource search template
get_template_part('resource-search-template');

// Fetch author details
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$args = array(
        'author'         =>  $curauth->data->ID,
        'orderby'        =>  'post_date',
        'post_type'      =>  'resource',
        'post_status'    =>  'publish',
        'order'          =>  'DESC',
        'posts_per_page' => $show_more_limit
    );

$resources = new WP_Query($args);

//create a object to show estimated reading time for a post.
$estimated_time = new EstimatedPostReadingTime();
?>
<section class="topics-bg">
    <div class="container">
        <div class="row voffset-bottom3">
            <div class="col-md-12 clearfix">
                <h3 class="section-heading"><?php echo $curauth->display_name; ?></h3>
            </div>
        </div>
    </div>
</section>
<?php 
if ( $resources->have_posts() ) {
    ?>
        <div id="all_resources_block">
        <div class="container">
            <div class="row">
                <div class="col-md-9 resource-container" id="listing-resources">						
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="section-heading">All Listing</h2>
                        </div>
                    </div>
                    <?php 
                    while ($resources->have_posts()) : $resources->the_post();
                        
                         // Sponsored By
                        $sponsored_by = get_post_meta($post->ID, 'wpcf-sponsored-by', true);
                        $sponsored_by = strlen($sponsored_by) >= 15 ? substr($sponsored_by, 0, 15) . ' ...' : $sponsored_by;
                        
                        // Reading time
                        $reading_time = $estimated_time->estimate_time_shortcode($post)." Read";
                        $meta         =  get_post_meta($post->ID, '_fvp_video', true);
                        if ( is_array($meta) && array_key_exists('id',$meta ) ) {
                           $video_attach_data  =  get_post_meta($meta['id'], '_wp_attachment_metadata');
                           $reading_time = $video_attach_data[0]['length_formatted']." minute View";
                       }
                        
                         // Fetch topic of a resource
                        $resource_topics = wp_get_post_terms($post->ID, 'resource-topic', array("fields" => "names"));
                        if (!empty($resource_topics)) {
                            $topics = 'in ' . implode(", ", $resource_topics);
                            $topics = strlen($topics) >= 26 ? substr($topics, 0, 26) . ' ...' : $topics;
                        } else {
                            $topics = '';
                        }
                        ?>
                        <div class="row">
                            <div class="col-sm-12 resource-list">								
                                <?php
                                if (has_post_thumbnail($post->ID)) {
                                        ?>
                                        <div class="resource-image">
                                            <a href="<?php echo get_the_permalink($post->ID); ?>" title="<?php echo get_the_title(); ?>">
                                                <?php echo get_the_post_thumbnail($post->ID); 
                                                if ( is_array($meta) && array_key_exists('id',$meta ) ) {
                                                     ?>
                                                    <div class="video-play-icon"><i></i></div>
                                                    <?php
                                                }
                                            ?>
                                            </a>
                                            
                                        </div>
                                        
                                    <?php
                                }
                                ?>
                                <div class="resource-content">
                                    <p class="read-date"><?php echo themeblvd_time_ago($post); ?> <b><?php echo $topics; ?></b></p>
                                    <p class="featured-title">
                                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php echo esc_attr(strlen($post->post_title) >= 75 ? substr($post->post_title, 0, 75) . ' ...' : $post->post_title); ?></a>
                                    </p>
                                    <p><?php echo strlen(strip_tags($post->post_content)) >= 150 ? substr(strip_tags($post->post_content), 0, 150) . ' ...' : strip_tags($post->post_content); ?></p>
                                    <?php
                                    if ($reading_time) {
                                        ?>
                                        <p class="read-time"><?php echo $reading_time; ?></p>
                                        <?php
                                    }
                                    
                                    if ( $sponsored_by != '' ) {
                                        ?>
                                        <div class="sponsored">
                                            <p>Sponsored By <?php echo $sponsored_by; ?></p>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    ?>
                    <?php
                    if ( $resources->found_posts > $show_more_limit ) {
                        ?>
                        <div class="show-more-terms paginate-author-listing">
                            <a href="javascript:void(0)" title="show more user terms of loan"> SHOW MORE <i class="glyphicon glyphicon-chevron-down"></i> </a>
                            <form>
                                <input type="hidden" id="paginate-author-offset"  value="2" name="author_offset" />
                                <input type="hidden" id="author-id"  value="<?php echo $curauth->data->ID; ?>" name="author_id" />
                            </form>
                        </div>
                        <div id="loader-conatiner">
                            <img id="loading-image" src="<?php echo get_template_directory_uri(); ?>/images/loader.gif" style="display:none;"/>
                        </div>
                        <?php       
                    }
                    ?>
                </div>
               <?php get_template_part('resource-sidebar'); ?>
            </div>
        </div>				
    </div>
    <?php   
}
?>
<!-- Related Articles section -->
<?php 
// Fetured resources
$args = array(
    'post_type'       => 'resource',
    'post_status'     => 'publish',
    'posts_per_page'  => 3,
    'meta_query'      => array(
         'relation' => 'AND',
        array(
            'key'     => '_is_featured',
            'value'   => 'yes'
        ),
        array(
            'key'   => 'wpcf-sponsored-by',
            'value' => '',
            'compare' => '!='
        )),
    'orderby'         => 'menu_order date',
    'order'           => 'ASC'
);
 $resources = new WP_Query($args);

    if ($resources->have_posts()) {
    ?>
      <section id="articles">
        <div class="related-articles">
            <div class="container">
                <div class="row">
                    <h2 class="section-heading"> Featured Articles</h2>
                    <?php
                    while ($resources->have_posts()) : $resources->the_post();
                        // Fetch topic of a resource
                        $resource_topics = wp_get_post_terms($post->ID, 'resource-topic', array("fields" => "names"));
                        if (!empty($resource_topics)) {
                            $topics = implode(", ", $resource_topics);
                            $topics = strlen($topics) >= 22 ? substr($topics, 0, 22) . ' ...' : $topics;
                        } else {
                            $topics = '';
                        }

                        // Reading time
                        $reading_time = $estimated_time->estimate_time_shortcode($post)." Read";
                        $meta         =  get_post_meta($post->ID, '_fvp_video', true);
                        if ( is_array($meta) && array_key_exists('id',$meta ) ) {
                           $video_attach_data  =  get_post_meta($meta['id'], '_wp_attachment_metadata');
                           $reading_time = $video_attach_data[0]['length_formatted']." minute View";
                       }
                       
                        // Sponsored By
                        $sponsored_by = get_post_meta($post->ID, 'wpcf-sponsored-by', true);
                        $sponsored_by = strlen($sponsored_by) >= 15 ? substr($sponsored_by, 0, 15) . ' ...' : $sponsored_by;
                        
                        ?>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <?php
                                if (has_post_thumbnail(get_the_ID())) {
                                    
                                        ?>
                                        <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                        <?php
                                        echo get_the_post_thumbnail(get_the_ID(), 'related-articles', array('class' => 'img-responsive hidden-xs'));
                                        if ( is_array($meta) && array_key_exists('id',$meta ) ) {
                                             ?>
                                            <div class="video-play-icon"><i></i></div>
                                            <?php
                                        }
                                        ?>
                                        </a>
                                            <?php
                                      
                                    }
                                    ?>
                                <div class="caption">
                                    <p class="read-date"><span><?php echo $topics; ?></span> • <?php echo themeblvd_time_ago($post); ?></p>
                                    <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo esc_attr(strlen(get_the_title()) >= 40 ? substr(get_the_title(), 0, 40) . ' ...' : get_the_title()); ?></a></h3>
                                    <p class="hidden-xs"><?php echo strlen(strip_tags(get_the_content())) >= 145 ? substr(strip_tags(get_the_content()), 0, 145) . ' ...' : strip_tags(get_the_content()); ?></p>
                                    <?php
                                        if (isset($reading_time) && $reading_time != '') {
                                            ?>
                                            <p class="read-time hidden-xs"><?php echo $reading_time; ?></p>
                                        <?php }
                                        ?>
                                       
                                </div>
                                <?php
                                if ( $sponsored_by != '' ) {
                                    ?>
                                    <div class="sponsored">
                                        <p>Sponsored By <?php echo $sponsored_by; ?></p>
                                    </div>
                                    <?php
                                }
                                ?>
                                
                            </div>
                        </div>
        <?php
    endwhile;
    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>
<!-- Related Articles section -->
<section class="get-funded">
    <div class="container text-center">
        <h2 class="section-heading"> Get Funded </h2>
        <h3> Smart, Simple & Fast. </h3>
        <a href="javascript:void(0);" title="APPLY NOW" class="btn btn-blue-bg"> APPLY NOW <i class="glyphicon glyphicon-play"></i></a>
    </div>
</section>
<?php get_footer(); ?>
