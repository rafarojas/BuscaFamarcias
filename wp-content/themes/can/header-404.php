<?php
ob_start();
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
        <?php wp_head(); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
</head>
<body <?php body_class(); ?>>
    
    <section class="skip_navigation">
            <a href="#main_content" tabindex="1">Skip to main Content</a>
    </section>
    <?php
    global $show_more_limit,$post;
    $show_more_limit = get_option('posts_per_page');
    //Fetch whether to show sticky nav on page or not
    wp_reset_postdata();
    $sticky_nav_value = get_post_meta($post->ID, 'wpcf-display-sticky-navigation', true);
    ?>
    <div class="wrapper">
        <nav class="navbar" role="navigation">
            <div class="utility-navigation hidden-xs">
                <div class="container">
                    <div class="collapse navbar-collapse2">		    	
                        <?php
                        // Call utility header
                        $args = array('menu' => 'Utility Navigation', 'menu_class' => 'nav navbar-nav navbar-right', 'container' => false);
                        wp_nav_menu($args);
                        ?>	
                    </div>
                </div>  
            </div>
            <div id="main_navigationbar" class="primary-nav">
                <div class="container">
                    <div class="navbar-header ">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="navbar-brand" title="CAN CAPITAL"><img src="<?php echo get_header_image(); ?>" alt="" /></a>
                    </div>
                    <div class="collapse navbar-collapse mob-main-menu">
                        <div class='responsive-bg'> 
                            <ul class="nav navbar-nav navbar-right">
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

                                <?php
                                // Call header main menu
                                $args = array(
                                    'menu' => 'Main Navigation',
                                    'menu_class' => 'nav navbar-nav navbar-right',
                                    'container' => '',
                                    'container_class' => false,
                                    'items_wrap' => '%3$s',
                                    'theme_location' => 'primary',
                                    'submenu_class' => 'dropdown-menu');
                                wp_nav_menu($args);
                                ?>
                            </ul>
                        </div>
                        <div class="nav-cover visible-xs" data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">


                        </div>


                    </div><!-- /.navbar-collapse -->
                </div>
            </div>
            <?php
            $top_headline = get_post_meta($post->ID, 'wpcf-page-headline-title', true);
            ?>
            <div class="container">
                <div class="head-titles">
                    <h1 id="main_content"><?php echo $top_headline; ?> </h1>
                </div>
            </div>
            <!-- /.container-fluid -->		  
        </nav>
        
       