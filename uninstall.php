
<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit; // Exit if accessed directly.
}

delete_option('cwp_welcome_message');
delete_option('cwp_background_color');
