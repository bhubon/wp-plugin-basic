<?php

namespace WeDevs\Academy\Admin;

/**
 * The Menu handler class
 */

class Menu {
    /**
     * Initialize the menu class
     */
    function __construct() {
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    /**
     * Render admin menu
     *
     * @return void
     */
    public function admin_menu() {
        $parent_slug = 'wedevs-academy';
        $capability = 'manage_options';

        add_menu_page(__('weDevs Academy', 'wedevs-academy'), __('Academy', 'wedevs-academy'), $capability, $parent_slug, [$this, 'addressbook_page'], 'dashicons-welcome-learn-more',);
        add_submenu_page($parent_slug, __('Address', 'wedevs-academy'), __('Address', 'wedevs-academy'), $capability, $parent_slug, [$this, 'addressbook_page']);
        add_submenu_page($parent_slug, __('Settings', 'wedevs-academy'), __('Settings', 'wedevs-academy'), $capability, "settings", [$this, 'settings_page']);
    }

    /**
     * Render the plugin page
     *
     * @return void
     */
    public function addressbook_page() {
        $addressbook = new Addressbook();
        $addressbook->plugin_page();
    }

    /**
     * Render the sesttings page
     *
     * @return void
     */
    public function settings_page() {
        echo "Hello World";
    }
}
