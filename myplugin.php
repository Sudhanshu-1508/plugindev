<?php

/**
 * Plugin Name: myplugin
 * Author: Sudhanshu
 * Version: 1.0
 * Text Domain: elementor
 */

define( 'MYPLUGIN_FILE' , __FILE__ );
define('THEME_VERSION', '1.0');

require_once dirname(__FILE__) . '/includes/wp_requirements.php';
$plugin_checks = new Plugin_Requirements( 'myplugin', MYPLUGIN_FILE, array(
    'PHP' => '5.3.3'  ,
  'WordPress' => '4.1'
) );
if( false === $plugin_checks->pass() ){
    $plugin_checks_->halt();
    return;
}

require_once dirname(__FILE__) . '/includes/short_code.php';
require_once dirname(__FILE__) . '/includes/custom_post_type.php';
require_once dirname(__FILE__) . '/includes/admin_settings.php';
require_once dirname(__FILE__) . '/includes/news_content.php';
require_once dirname(__FILE__) . '/includes/add_content.php';
require_once dirname(__FILE__) . '/includes/test_api_calls.php';
require_once dirname(__FILE__) . '/includes/welcome_screen.php';

//function add_news_meta_box(){
//    add_meta_box( 'news_meta_box', 'News Location', 'render_news_location_meta_box', 'news', 'normal', 'low' );
//}
//add_action( 'add_meta_boxes_news', 'add_news_meta_box' );
//
//function render_news_location_meta_box ( $post ) {
//
//}
//
//function add_location_to_content( $content ){
//    if( is_singular( 'news' ) )
//    $content = ' <p class="news-loaction">Pune, India</p>' .  $content;
//    return $content;
//}
//add_filter( 'the_content' , 'add_loaction_to_content' );


function add_posts_to_end_of_content ( $content ) {
    if ( is_singular( 'news' )) {
        $args = array(
            'numberposts' => 3,
            'post_type'=>'news',
            'post_not_in' => array( get_the_ID() ),
            'meta_key' => '_news_location',
            'meta_value' => get_post_meta( get_the_ID(), '_news_location', true)
        );
    }
}

