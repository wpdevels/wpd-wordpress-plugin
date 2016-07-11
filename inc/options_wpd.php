<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


if (!current_user_can('manage_options')) {
    wp_die(_e('You are not authorized to view this page.', 'wpdplugin'));
}

$option_name = 'wp_wpd_options';
$inputs = get_option($option_name);

if (isset( $_POST['wpdoptions'] ) && wp_verify_nonce( $_POST['wpdoptions'], 'wpdoptionsnonce' )) {

    $inputs = $_POST['inputs'];
    if ( get_option( $option_name ) !== false ) {
        $update = update_option($option_name, $inputs);
    } else {
        $deprecated = null;
        $autoload = 'no';
        $update = add_option($option_name, $inputs, $deprecated, $autoload);
    }

    if($update) {
        echo '<div class="updated">';
        _e('settings saved.', 'wpdplugin');
        echo '</strong></p></div>';
    } else {
        echo '<div class="error"><p><strong>';
        _e('Error - Url does not seems to be correct.', 'wpdplugin');
        echo '</strong></p></div>';
    }
}
?>
<div class="wrap" xmlns="http://www.w3.org/1999/html">
        <div id="welcome-panel" class="welcome-panel">
                <div class="welcome-panel-content">
                    <h2><?php _e('WPD base Plugin', 'wpdplugin'); ?></h2>
                </div> 
                <div class="clear"></div>   
                <div class="welcome-panel-column-container">
                        <form id="form1" name="form1" method="post" action="">
                            <?php wp_nonce_field( 'wpdoptionsnonce', 'wpdoptions' ); ?>
                                <div class="wpdoptions">
                                    <p></p><label for="hashname"><?php _e('Your First Entry', 'wpdplugin'); ?></label>
                                    <input type="text" name="inputs[0][yourfirstentry]" id="yourfirstentry" size="80" value="<?php echo $entry = isset($inputs[0]['yourfirstentry']) ? $inputs[0]['yourfirstentry'] : ""; ?>"></p>
                                </div>
                            <p class="submit">
                                <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes')?>" />
                            </p>
                        </form>
                </div>
        </div>
</div><!-- end wrap -->                    

