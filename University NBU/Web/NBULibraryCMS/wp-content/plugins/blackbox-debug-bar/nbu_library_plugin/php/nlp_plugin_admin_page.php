<?php
/* * ****************************************************************************
 * Admin page                                                                  *
 * **************************************************************************** */

function nlp_options_page() {
    global $nlp_plugin_options;
    global $nlp_plugin_name;
    ?>

    <div class="wrap">
        <h2><?php echo $nlp_plugin_name; ?></h2>
        <h3>Плъгин за Резервиране на залите на Библиотеката на НБУ</h3>
        <form method="POST" id="nlp_form" action="options.php">
            <?php settings_fields("nlp_settings_group")?>
            <p>
                <label class="description" for="nlp_settings[nlp_on]"><?php _e("Пускане на Плъгинът", "nlp_domain") ?></label>
                <input type="checkbox" name="nlp_settings[nlp_on]" id="nlp_settings[nlp_on]" value="1" <?php if (isset($nlp_plugin_options["nlp_on"])) checked($nlp_plugin_options["nlp_on"], 1); ?> />
            </p>
            <p>
                <label class="description" for="nlp_settings[nlp_menu_position]"><?php _e("Opit ", "nlp_domain") ?></label>
                <input type="radio" name="nlp_settings[nlp_menu_position]" id="nlp_settings[nlp_menu_position]" value="1" <?php if (isset($nlp_plugin_options["nlp_menu_position"])) checked($nlp_plugin_options["nlp_menu_position"], 1); ?> />Yes
                <input type="radio" name="nlp_settings[nlp_menu_position]" id="nlp_settings[nlp_menu_position]" value="0" <?php if (isset($nlp_plugin_options["nlp_menu_position"])) checked($nlp_plugin_options["nlp_menu_position"], 0); ?> />No
            </p>
            
                <div class="submit" id="nlp_submit_div">
                    <input type="submit" class="button-primary" value="<?php _e('Save', 'nlp_domain'); ?>" />
                    
                </div>
            </form>
        </div>

        <?php
           
       
}
          
    

//Add options page
    function nlp_add_options_link() {
        if (current_user_can('manage_options')) {
            add_menu_page('NBU_Library', 'НБУ Библиотека', 'publish_posts', __FILE__, 'nlp_options_page');
        }
    }

    add_action('admin_menu', 'nlp_add_options_link');

//Save options
    function nlp_register_settings() {
        register_setting('nlp_settings_group', 'nlp_settings');
    }

    add_action('admin_init', 'nlp_register_settings');


    