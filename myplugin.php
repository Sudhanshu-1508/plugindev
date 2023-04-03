<?php

/**
 * Plugin Name: myplugin
 * Author: Sudhanshu
 *
 * Text Domain: elementor
 */

function myplugin_tst_shortcode( $atts ){
    $atts = shortcode_atts( array(
        'title'=> 'Default Title',
    ) , $atts);
    return '<div class="test"><h2>' . $atts['title'] . '</he>test</div>';
}
add_shortcode('my-test-shortcode' , 'myplugin_tst_shortcode');