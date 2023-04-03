<?php

/**
 * Plugin Name: myplugin
 * Author: Sudhanshu
 *
 * Text Domain: elementor
 */

define( 'MYPLUGIN_FILE' , __FILE__ );

require_once dirname(__FILE__) . '/includes/short_code.php';
require_once dirname(__FILE__) . '/includes/custom_post_type.php';


function add_location_to_news( $content ){
    if( is_singular( 'news' ) )
    $content = ' <p class="news-loaction">Pune, India</p>' . $content;
    return $content;
}
add_filter( 'the_content' , 'add_loaction_to_news' );

