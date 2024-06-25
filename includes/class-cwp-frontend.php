<?php

namespace CWP;

class Frontend {

    public function display_welcome_message() {
        add_action('wp_footer', [ $this, 'show_welcome_message' ]);
    }

    public function show_welcome_message() {
        $message = get_option('cwp_welcome_message', __('Welcome to our website!', 'custom-welcome-plugin'));
        $color = get_option('cwp_background_color', '#ffffff');
        echo '<div class="custom-welcome-message" style="background-color: ' . esc_attr($color) . ';">' . esc_html($message) . '</div>';
    }
}
