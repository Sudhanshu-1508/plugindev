<?php

/**
 * Plugin Name: myplugin
 * Author: Sudhanshu
 *
 * Text Domain: elementor
 */

function myplugin_tst_shortcode( $atts, $content='' ){
    $atts = shortcode_atts( array(
        'color' => '#0a0a0a',
    ) , $atts); 
    ob_start();
    ?>
    <div class="test">
        <h2><?php echo $content; ?></h2>
        <span style="color:<?php echo $atts['color'] ?>">testing</span>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('my-test-code' , 'myplugin_tst_shortcode');


/* Custom Post Type Start */
function create_posttype() {
    // Register News post type
    $args = array(
        'public'=> true,
        'label' => 'News',
        'has_archieve' =>true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
    );

    register_post_type( 'news' , $args );
    
    // Register News Category taxonomy
    register_taxonomy(
        'news_category', 
        'news',  
        array(
           'hierarchal' => true,
           'label'=>'News Categories'
        )
    );
}
add_action( 'init', 'create_posttype' );

function add_location_to_news( $content ){
    if( is_singular( 'news' ) )
    $content = ' <p class="news-loaction">Pune, India</p>' . $content;
    return $content;
}
add_filter( 'the_content' , 'add_loaction_to_news' );

function posttype_activate(){
    create_posttype();
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'posttype_activate' );