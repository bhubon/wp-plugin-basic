<?php

namespace WeDevs\Academy\Admin;

if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * List table class
 */
class Address_List extends \WP_List_Table {

    function __construct() {
        parent::__construct([
            'singular' => 'contact',
            'plural' => 'contacts',
            'ajax' => false
        ]);
    }

    public function get_columns() {
        return [
            'cb' => '<input type="checkbox">',
            'name' => __('Name', 'wedevs-academy'),
            'address' => __('Address', 'wedevs-academy'),
            'phone' => __('Phone', 'wedevs-academy'),
            'created_at' => __('Date', 'wedevs-academy'),
        ];
    }

    public function prepare_items() {
        $colums = $this->get_columns();
        $hidden = [];
        $sortable = $this->get_sortable_columns();

        $per_page = 20;

        $this->_column_headers = [$colums, $hidden, $sortable];

        $this->items = wd_ac_get_addresses();

        $this->set_pagination_args([
            'total_items' => wd_ac_address_count(),
            'per_page' => $per_page,
        ]);
    }
}
