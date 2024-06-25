<?php

namespace CWP;

class Loader {

    protected $settings;
    protected $frontend;
    protected $enqueue;

    public function __construct() {
        require_once CWP_PLUGIN_DIR . 'includes/class-cwp-settings.php';
        require_once CWP_PLUGIN_DIR . 'includes/class-cwp-frontend.php';
        require_once CWP_PLUGIN_DIR . 'includes/class-cwp-enqueue.php';

        $this->settings = new Settings();
        $this->frontend = new Frontend();
        $this->enqueue = new Enqueue();
    }

    public function run() {
        $this->settings->register_settings();
        $this->settings->add_settings_page();
        $this->frontend->display_welcome_message();
        $this->enqueue->enqueue_styles();
    }
}
