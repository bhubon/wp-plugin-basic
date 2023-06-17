<?php
/*
* Plugin Name: weDevs Academy
* Description: a tutorial plugin for weDevs
* Pluin URI: https://thedevnmil.com
* Author: Bhubon Nil
* Author URI:https://thedevnmil.com
* Version: 1.0
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * The main plugin class
 */

final class WeDevsAcademy {

    /**
     * Plugin Version
     * @return string
     */
    const version = '1.0';

    /**
     * Class Constructor
     */
    private function __construct() {
        $this->define_constants();

        register_activation_hook(__FILE__, [$this, 'activate']);

        add_action('plugins_loaded',[$this,'init_plugin']);
    }

    /**
     * Initializes a singleton instance
     *
     * @return \WeDevs_Academy
     */
    public static function init() {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }
        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define('WD_ACADEMY_VERSION', self::version);
        define('WD_ACADEMY_FILE', __FILE__);
        define('WD_ACADEMY_PATH', __DIR__);
        define('WD_ACADEMY_URL', plugins_url('', WD_ACADEMY_FILE));
        define('WD_ACADEMY_ASSETS', WD_ACADEMY_URL . '/assets');
    }

    /**
     * Run actication hook
     *
     * @return void
     */
    public function activate() {
        $installed = get_option('wp_academy_installed');

        if (!$installed) {
            update_option('wp_academy_installed', time());
        }

        update_option('wp_academy_version', WD_ACADEMY_VERSION);
    }
}

/**
 * Initializes the main plugin
 *
 * @return \wedevs_academy
 */
function wedevs_academy() {
    return WeDevsAcademy::init();
}

/** 
 * kick of the plugin
 */
wedevs_academy();
