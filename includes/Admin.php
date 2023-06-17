<?php

namespace WeDevs\Academy;

/**
 * The Admin Class
 */
class Admin {

    /**
     * Initialize the class
     */
    function __construct() {
        $this->dispatch_action();
        new Admin\Menu();
    }

    public function dispatch_action() {
        $addressbook = new Admin\Addressbook();

        add_action('admin_init', [$addressbook, 'form_handle']);
    }
}
