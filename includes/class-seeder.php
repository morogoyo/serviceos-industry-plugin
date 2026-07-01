<?php
namespace ServiceOS_Industry_Plugin;

class Seeder {
    public static function register() {
        add_filter('serviceos_crm_module_seed', [__CLASS__, 'seed'], 10, 2);
    }

    public static function seed(array $seed_data, string $module_slug) {
        if ($module_slug !== 'industry-plugin') {
            return $seed_data;
        }

        $business_id = (int) get_option('service_os_crm_business_id', 0);

        return [
            'business_id' => $business_id,
            'categories' => [
                [
                    'name' => 'General',
                    'singular_label' => 'Service',
                    'plural_label' => 'Services',
                    'icon' => 'folder',
                    'color' => '#0073aa',
                ],
                // Add more categories for your industry:
                // ['name' => 'Installation', 'singular_label' => 'Install', 'icon' => 'build'],
                // ['name' => 'Repair', 'singular_label' => 'Repair Job', 'icon' => 'handyman'],
            ],
            'pipeline' => [
                'name' => 'Sales Pipeline',
                'stages' => [
                    'Lead',
                    'Qualified',
                    'Proposal',
                    'Closed Won',
                    'Closed Lost',
                ],
            ],
            'services' => [
                // Add seed services for your industry:
                // ['title' => 'Service Name', 'category_slug' => 'general', 'value' => 0],
            ],
        ];
    }
}
