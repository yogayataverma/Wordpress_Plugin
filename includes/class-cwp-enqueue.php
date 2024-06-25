<?php

namespace CWP;

class Enqueue {

    public function enqueue_styles() {
        add_action('wp_enqueue_scripts', [ $this, 'load_styles' ]);
    }

    public function load_styles() {
        wp_enqueue_style('cwp-styles', plugins_url('../assets/css/styles.css', __FILE__));
    }
}
