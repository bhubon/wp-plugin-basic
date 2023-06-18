<?php

namespace WeDevs\Academy;


/**
 * Installer class
 */
class Installer
{

    /**
     * Run the installer
     *
     * @return void
     */
    public function run()
    {
        $this->add_version();
        $this->create_table();
    }

    /**
     * Add version and necessary data on plugin install
     *
     * @return void
     */
    public function add_version()
    {
        $installed = get_option('wp_academy_installed');

        if (!$installed) {
            update_option('wp_academy_installed', time());
        }

        update_option('wp_academy_version', WD_ACADEMY_VERSION);
    }

    /**
     * Create necedssary table
     *
     * @return void
     */
    public function create_table()
    {
        global $wpdb;

        $charset = $wpdb->get_charset_collate();

        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ac_addresses` (
            `id` INT NOT NULL AUTO_INCREMENT ,
            `name` VARCHAR(100) NOT NULL ,
            `address` VARCHAR(255) NULL ,
            `phone` VARCHAR(30) NULL ,
            `created_by` BIGINT NOT NULL ,
            `created_at` DATETIME NOT NULL , PRIMARY KEY (`id`)
            ) $charset;
        ";

        if (!function_exists('dbdelta')) {
            require ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta($schema);
    }
}
