<?php

class plugin_Admin{
    function __construct() {
        add_action( 'admin_menu' , array( $this, 'register_settings_menu_page'));
        add_action( 'admin_enqueue_stylesheet', array( $this, 'add_styles' ) );
    }

    function add_styles( $hook ){
        if( 'news_page_news-settings' != $hook){
            return;
        }
       wp_enqueue_style('news-settigns-style',  
       plugins_url('includes/css/settings.css', MYPLUGIN_FILE),
       array(),
       THEME_VERSION
    );
    }
    function register_settings_menu_page() {
        add_submenu_page( 'edit.php?post_type=news', 'News Settings', 'Settings', 'manage_options', 'news-settings', array( $this, 'render_settings_page' ));
    }
    function render_settings_page(){
        if(isset( $_POST['news_settings_nonce'])) {
            $this->save_settings();
        }
        include dirname(__FILE__) . '/templates/admin_settings.php';
    }

    function save_settings(){
        if( !wp_verify_nonce( $_POST['news_settings_nonce'], 'news-settings-save')){
         //   wp_die(' Security token invalid ');
        }

        if( isset( $_POST['news_related_title'] ) )
            update_option( 'custom_news_related_title', sanitize_text_field($_POST['news_related_title'] ));
    }

    function show_success_message(){
        ?>
        <div class="notice notice-success">
            Settings Saved
        </div>
        <?php
    }
}

$my_admin = new plugin_Admin();
