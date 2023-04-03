<?php

/**
 * Plugin Name: myplugin
 * Author: Sudhanshu
 * Version: 1.0
 * Text Domain: elementor
 */

define( 'MYPLUGIN_FILE' , __FILE__ );
define('THEME_VERSION', '1.0');

require_once dirname(__FILE__) . '/includes/short_code.php';
require_once dirname(__FILE__) . '/includes/custom_post_type.php';
require_once dirname(__FILE__) . '/includes/admin_settings.php';


//function add_location_to_news( $content ){
//    if( is_singular( 'news' ) )
//    $content = ' <p class="news-loaction">Pune, India</p>' . $content;
//    return $content;
//}
//add_filter( 'the_content' , 'add_loaction_to_news' );
//
function add_post_to_end_of_content( $content ){
    global $post;
    if( is_singular() ){
        $args = array(
            'numberposts' => 6
        );
        $latest_posts = get_posts( $args );
        ob_start();
        ?>
        <ul class="latest-posts">
            <?php foreach ( $latest_posts as $post) : ?>
              
                <?php setup_postdata( $post); ?>
                <li><a href="<?php echo get_the_permalink( $post->ID);?>"><?php echo get_the_title( $post->ID); ?></li>
                <?php endforeach; ?>
            </ul>
            <?php 
            $content .= ob_get_clean();
            wp_reset_postdata();
    }
    return $content;
}
add_filter( 'the_content', 'add_post_to_end_of_content');