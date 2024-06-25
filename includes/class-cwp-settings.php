<?php

namespace CWP;

class Settings {

    public function register_settings() {
        add_action('admin_init', [ $this, 'register_plugin_settings' ]);
    }

    public function register_plugin_settings() {
        register_setting('cwp_settings_group', 'cwp_welcome_message', 'sanitize_text_field');
        register_setting('cwp_settings_group', 'cwp_background_color', 'sanitize_hex_color');

        add_settings_section('cwp_main_section', __('Main Settings', 'custom-welcome-plugin'), [ $this, 'section_text' ], 'custom-welcome-settings');

        add_settings_field('cwp_welcome_message', __('Welcome Message', 'custom-welcome-plugin'), [ $this, 'welcome_message_field' ], 'custom-welcome-settings', 'cwp_main_section');
        add_settings_field('cwp_background_color', __('Background Color', 'custom-welcome-plugin'), [ $this, 'background_color_field' ], 'custom-welcome-settings', 'cwp_main_section');
    }

    public function section_text() {
        echo '<p>' . __('Enter your custom welcome message and select a background color.', 'custom-welcome-plugin') . '</p>';
    }

    public function welcome_message_field() {
        $message = get_option('cwp_welcome_message', '');
        echo '<input type="text" name="cwp_welcome_message" value="' . esc_attr($message) . '" />';
    }

    public function background_color_field() {
        $color = get_option('cwp_background_color', '#ffffff');
        echo '<input type="color" name="cwp_background_color" value="' . esc_attr($color) . '" />';
    }

    public function add_settings_page() {
        add_action('admin_menu', function() {
            add_menu_page(__('Custom Welcome Settings', 'custom-welcome-plugin'), __('Welcome Settings', 'custom-welcome-plugin'), 'manage_options', 'custom-welcome-settings', [ $this, 'render_settings_page' ]);
        });
    }

    public function render_settings_page() {
        ?>
        <div class="wrap">
            <h1><?php _e('Custom Welcome Settings', 'custom-welcome-plugin'); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('cwp_settings_group');
                do_settings_sections('custom-welcome-settings');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}
