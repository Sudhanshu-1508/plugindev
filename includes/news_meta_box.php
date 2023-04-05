<?php
function add_news_meta_box() {
    add_meta_box( 'news_meta_box', 'News Location', 'render_news_location_meta_box' , 'news', 'normal', 'low');
}
add_action( 'add_meta_boxes_news', 'add_news_meta_box' );

function render_news_location_meta_box( $post ) {
    wp_nonce_field( 'news_meta_box_saving', 'news_meta_box_nonce' );
    ?>
    <div class="inside">
        <p>
            <label class="screen-render-text" for="news_location"><?php echo esc_html( __('Location', 'myplugin-sk'))?></label>
            <input id="news_location" type="text" name="news_location" value="<?php echo esc_attr(get_post_meta($post->ID, '_news_location', true)) ?>">
        </p>
    </div>
    <?php  
}

function save_news_meta_data( $post_id ) {

    if( !isset( $_POST['news_meta_box_nonce'] ) ||  !wp_verify_nonce($_POST['news_meta_box_nonce'], 'news_meta_box_saving', )) {
        return;
    }

    if( !current_user_can( 'edit_post', $post_id )){
        return;
    }

    if( defined( 'DOING_AUTOSAVE'  ) && DOING_AUTOSAVE ){
        return;
    }

    if( isset( $_POST['news_location'])){
        update_post_meta( $post_id, '_news_location',sanitize_text_field($_POST['news_location'] ));
    }
    //sanitize email, is_int?
}

add_action( 'save_post_news' , 'save_news_meta_data');

