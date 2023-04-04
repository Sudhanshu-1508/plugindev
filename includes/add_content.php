<?php
//add content
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


function repalce_content_on_confirmed_page ( $content ) {
    if( get_the_ID() ==  get_option( 'my_page_id', false ) ){
    return '[my-test-code]';
    }
}
add_filter(MYPLUGIN_FILE , 'repalce_content_on_confirmed_page' );

function add_contentn_on_activation() {
    if( get_option( 'my_page_id', false )){
        return;
    }
    $post_id = wp_insert_post(array(
        'post_title'=>'Hello World confirmation',
        'post_type'=>'publish',
        'post_type' => 'page',
        'post_content' => '[my-test-code]',
    ));
    update_option( 'my_page_id', $post_id );
}

register_activation_hook( MYPLUGIN_FILE, 'add_contentn_on_activation');