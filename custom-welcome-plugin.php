<?php
/*
Plugin Name: Custom Welcome Plugin 1
Description: A plugin to set a custom welcome message and background color.
Version: 1.0
Author: Yogayata Verma
Text Domain: custom-welcome-plugin
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define('CWP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CWP_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once CWP_PLUGIN_DIR . 'includes/class-cwp-loader.php';

function cwp_initialize_plugin() {
    $plugin = new \CWP\Loader();
    $plugin->run();
}
add_action('plugins_loaded', 'cwp_initialize_plugin');
