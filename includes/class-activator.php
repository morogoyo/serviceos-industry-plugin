<?php
namespace ServiceOS_Industry_Plugin;

class Activator {
    public static function activate() {
        update_option('serviceos_ip_seed_pending', true);
    }

    public static function deactivate() {
        // Cleanup if needed
    }
}
