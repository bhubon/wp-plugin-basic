<?php

namespace WeDevs\Academy;

class Assets {

    /**
     * Init the class
     */
    function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    /**
     * Define the scripts
     *
     * @return array
     */
    public function get_scripts() {
        return [
            'academy-script' => [
                'src' => WD_ACADEMY_ASSETS . '/js/frontend.js',
                'version' => WD_ACADEMY_VERSION,
                'deps' => ['jquery'],
            ],
            'academy-enquery-script' => [
                'src' => WD_ACADEMY_ASSETS . '/js/enquery.js',
                'version' => WD_ACADEMY_VERSION,
                'deps' => ['jquery'],
            ],
        ];
    }

    /**
     * Define the css
     *
     * @return array
     */
    public function get_styles() {
        return [
            'academy-style' => [
                'src' => WD_ACADEMY_ASSETS . '/css/frontend.css',
                'version' => WD_ACADEMY_VERSION,
            ],
            'academy-admin-style' => [
                'src' => WD_ACADEMY_ASSETS . '/css/admin.css',
                'version' => WD_ACADEMY_VERSION,
            ],
            'academy-enquery-style' => [
                'src' => WD_ACADEMY_ASSETS . '/css/academy-enquery-style.css',
                'version' => WD_ACADEMY_VERSION,
            ],
        ];
    }

    /**
     * Register the asstes 
     *
     * @return void
     */
    public function enqueue_assets() {

        $scripts = $this->get_scripts();

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? $script['deps'] : false;

            wp_register_script($handle, $script['src'], $deps, $script['version'], true);
        }

        $styles = $this->get_styles();

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;

            wp_register_style($handle, $style['src'], $deps, $style['version']);
        }

        wp_localize_script('academy-enquery-script', 'weDevsAcademy', [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'error'=> __('Something went wrong!','wedevs-academy')
        ]);
    }
}
