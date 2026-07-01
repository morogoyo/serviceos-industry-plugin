<?php
namespace ServiceOS_Industry_Plugin;

class Assets {
    public static function register() {
        add_action('admin_enqueue_scripts', [__CLASS__, 'enqueue']);
    }

    public static function enqueue() {
        $page = isset($_GET['page']) ? sanitize_key(wp_unslash($_GET['page'])) : '';
        if (strpos($page, 'service-os-crm') !== 0) {
            return;
        }

        wp_enqueue_style(
            'serviceos-ip-module',
            SERVICEOS_IP_URL . 'assets/css/module.css',
            ['service-os-crm-dashboard'],
            SERVICEOS_IP_VERSION
        );

        wp_enqueue_script(
            'serviceos-ip-module',
            SERVICEOS_IP_URL . 'assets/js/module.js',
            ['service-os-crm-api'],
            SERVICEOS_IP_VERSION,
            true
        );
    }
}
