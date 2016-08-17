<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
    </head>
    <body <?php body_class(); ?>>
        <?php
        global $show_more_limit;
        $show_more_limit = get_option('posts_per_page');
        ?>
<div class="wrapper" id="compaign-funding-block">
        <div class="water-mark-image"></div>
        <nav class="navbar" role="navigation" id="compaign-header">
            <div id="main_navigationbar" class="primary-nav">
                <div class="container">
                    <div class="navbar-header ">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="navbar-brand" title="CAN CAPITAL"><img src="<?php echo get_header_image(); ?>" /></a> <p class="entrepreneur">Entrepreneur</p> </a><a title="CANCAPITAL" href="#" class="sub-logo"> 
                        <?php
                                    if (has_post_thumbnail(get_the_ID())):
                                        ?>
                                        <div class="category-icon"> 
                                            <?php echo get_the_post_thumbnail(get_the_ID(), array(189,40)); ?>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse mob-main-menu">
                        <div class="row visible-xs">
                            <div class="col-xs-12 mob-style">
                                <div class="col-xs-6">
                                    <div class="row">
                                        <p class='label-main-menu'>Main Menu</p>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="row">
                                        <button class="btn-close-menu pull-right"  data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>		    	  
                        <ul class="nav navbar-nav navbar-right">		        	
                             <?php
                            // Call utility header
                            $args = array('menu' => 'campaign header', 'menu_class' => 'nav navbar-nav navbar-right', 'container' => false);
                            wp_nav_menu($args);
                            ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div>
            <div class="container">
                <h1><?php echo get_post_meta($post->ID, 'wpcf-page-headline-title', true); ?></h1>
            </div>
        </nav>
        <!--Financial Products -->
        <div  id="financial_product" class="gradient-one">
                <div id="home_get_quote">
                        <div id="get_quote_home" class="gradient-one get-Quote-form">
                           <?php echo get_template_part('get-quick-quote'); ?>
                        </div>
                </div>
        </div>                   