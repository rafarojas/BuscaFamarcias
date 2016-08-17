<?php

/**
 * Plugin Name: Theme Options
 * Description: Plugin created to provide URLs for social pages.
 * Version: 4.1.0
 * Author URI: 
 */
function theme_settings_page() {
    ?>
    <div class="wrap">
        <h1>Social Icons in Footer</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields("section");
            do_settings_sections("theme-options");
            submit_button();
            ?>          
        </form>
    </div>
    <?php
}

function add_theme_menu_item() {
    add_menu_page("Social Icons in Footer", "Social Icons in Footer", "manage_options", "theme-panel", "theme_settings_page", null, 99);
    add_options_page( 'Newsletter Subscription', 'Newsletter Subscription', 10, 'newsletter_subscription', 'newsletter_subscription' );
}

add_action("admin_menu", "add_theme_menu_item");

function display_twitter_element() {
    ?>
    <input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_facebook_element() {
    ?>
    <input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_linkedin_element() {
    ?>
    <input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>" />
    <?php
}

function display_youtube_element() {
    ?>
    <input type="text" name="youtube_url" id="youtube_url" value="<?php echo get_option('youtube_url'); ?>" />
    <?php
}

function display_theme_panel_fields() {
    add_settings_section("section", "All Settings", null, "theme-options");

    add_settings_field("twitter_url", "Twitter Profile Url:", "display_twitter_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url:", "display_facebook_element", "theme-options", "section");
    add_settings_field("linkedin_url", "LinkedIn Profile Url:", "display_linkedin_element", "theme-options", "section");
    add_settings_field("youtube_url", "YouTube Profile Url:", "display_youtube_element", "theme-options", "section");

    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
    register_setting("section", "linkedin_url");
    register_setting("section", "youtube_url");
}

add_action("admin_init", "display_theme_panel_fields");

function newsletter_subscription () {
    wp_enqueue_style('bootstrap', '/wp-content/plugins/theme-options/css/bootstrap.css');
    wp_enqueue_script('bootstrap', '/wp-content/plugins/theme-options/js/bootstrap.js');
    
    if ( isset($_POST['save_news_letter']) ) {
       update_option( 'news_letter_data', $_POST['news_letter'] );
    }
     // Fetch email format
    $news_letter = get_option('news_letter_data');
    ?>
    <div class="row">
        <h3>Newsletter Subscription:</h3>
        <div class="col-md-8">
            <form role="form" method="post" >
                <div class="form-group">
                    <label for="heading">Heading:</label>
                    <input type="text" class="form-control" id="heading" placeholder="Heading" name="news_letter[heading]" required value="<?php echo $news_letter['heading']; ?>" />
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" placeholder="Description" name="news_letter[description]" required value="<?php echo $news_letter['description']; ?>" /> 
                </div>
                <div class="form-group">
                    <label for="email-subject">Email Subject:</label>
                    <input type="text" class="form-control" id="email-subject" placeholder="Email Subject" name="news_letter[subject]" required value="<?php echo $news_letter['subject']; ?>" /> 
                </div>
                <div class="form-group">
                    <label for="email-body">Email Body:</label>
                    <?php 
                    $content = $news_letter['body'];
                    wp_editor( $content, 'email-body', $settings = array('textarea_name' => 'news_letter[body]') ); ?> 
                </div>
                <button type="submit" class="btn btn-primary" name="save_news_letter">Save</button>
            </form>
        </div>
    </div>
    <?php
    
}