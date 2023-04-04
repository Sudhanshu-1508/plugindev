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
require_once dirname(__FILE__) . '/includes/news_content.php';
require_once dirname(__FILE__) . '/includes/add_content.php';

//function add_location_to_news( $content ){
//    if( is_singular( 'news' ) )
//    $content = ' <p class="news-loaction">Pune, India</p>' . $content;
//    return $content;
//}
//add_filter( 'the_content' , 'add_loaction_to_news' );
//



