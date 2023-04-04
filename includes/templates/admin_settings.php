<div class="wrap">
    <h1>News Settings</h1>
    <form method="post" action="<?php echo admin_url('edit.php?post_type=news&page=news-settings' ) ?>">
        <?php wp_nonce_field('news-settinfs-save', 'news_settings_nonce'); ?>
        <table class="form-table">
            <tbody>
                <tr>
                    <th><label for="news_related_title">Related News Title</label></th>
                    <td><input id="news_related_title" type="text" name="news_related_title" value="<?php echo esc_attr( get_option( 'custom_news_related_title', 'Related News' ))?>"></td>
                </tr>
                <tr>
                    <th><label for="show_related">Show Related News?</label></th>
                    <td><input id="show_related" type="checkbox" name="show_related" value="1"<?php checked(get_option( ' show_related', true)); ?>></td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="submit" class="button button-primary"value="Save Changes">
    </form>
</div>
