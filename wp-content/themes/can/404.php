<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header('404');
?>

<!--404 Page -->
<section id="page-not-found">
    <div class="container voffset5">
        <div class="row">
            <div class="col-xs-12">
                <h1>PAGE NOT FOUND</h1>
                <h3>We're sorry, but we cannot find the page you were looking for.</h3>
            </div>        
            <div class="col-xs-12 col-sm-2">
                <img src="<?php echo get_template_directory_uri(); ?>/images/contruction_404.png">
            </div>
            <div class="col-xs-12 col-sm-10">
                <p>This might be because:</p>
                <ul class="col-xs-12">
                    <li>You typed the web address incorrectly</li>
                    <li>The page may have been moved, updated or deleted</li>
                </ul>
            </div>
        </div>
        <div class="row voffset6">
            <div class="col-xs-12">
                <h3>Please try one of the following options instead.</h3>
            </div>
            <div class="col-xs-12 col-sm-2">
                <img src="<?php echo get_template_directory_uri(); ?>/images/lightbulb_404.png">
            </div>
            <div class="col-xs-12 col-sm-10">                
                <ul class="col-xs-12">
                    <li>Select a link from menu above</li>                    
                    <li>Select a link from our site footer below </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
