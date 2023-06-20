<?php

namespace WeDevs\Academy\Admin;

use WeDevs\Academy\Traits\Form_Error;

/**
 * Addressbook handle class
 */
class Addressbook {

    use Form_Error;

    /**
     * Manage address views
     *
     * @return void
     */
    public function plugin_page() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'list';

        $id = isset($_GET['id']) ? intval(sanitize_text_field($_GET['id'])) : 0;

        switch ($action) {
            case 'new':
                $template = __DIR__ . '/views/address-new.php';
                break;
            case 'edit':
                $address = wd_ac_get_address($id);
                $template = __DIR__ . '/views/address-edit.php';
                break;
            case 'view':
                $template = __DIR__ . '/views/address-view.php';
                break;
            default:
                $template = __DIR__ . '/views/address-list.php';
                break;
        }

        if (file_exists($template)) {
            include $template;
        }
    }

    /**
     * Handle the form
     *
     * @return void
     */
    public function form_handle() {
        if (!isset($_POST['submit_address'])) {
            return;
        }

        if (!wp_verify_nonce($_POST['_wpnonce'], 'new-address')) {
            return;
        }

        if (!current_user_can('manage_options')) {
            return;
        }

        $id = isset($_POST['id']) ? intval(sanitize_text_field($_POST['id'])) : '';
        $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
        $address = isset($_POST['address']) ? sanitize_textarea_field($_POST['address']) : '';
        $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';

        if (empty($name)) {
            $this->errors['name'] = __('Please provide a name', 'wedevs-academy');
        }
        if (empty($phone)) {
            $this->errors['phone'] = __('Please provide a phone number', 'wedevs-academy');
        }

        if (!empty($this->errors)) {
            return;
        }

        $args = [
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
        ];

        if (isset($id)) {
            $args['id'] = $id;
        }

        $insert_id = wd_ac_insert_address($args);

        if (is_wp_error($insert_id)) {
            wp_die($insert_id->get_error_message());
        }

        if ($id) {
            $rediret_to = admin_url('admin.php?page=wedevs-academy&action=edit&address-update=true&id=' . $id);
        } else {
            $rediret_to = admin_url('admin.php?page=wedevs-academy&inserted=true');
        }

        // redirect
        wp_redirect($rediret_to);
        exit();
    }

    public function delete_address() {

        if (!wp_verify_nonce($_REQUEST['_wpnonce'], 'wd-ac-delete-address')) {
            return;
        }

        if (!current_user_can('manage_options')) {
            return;
        }

        $id = isset($_REQUEST['id']) ? intval(sanitize_text_field($_REQUEST['id'])) : '';

        if (wd_ac_delete_address($id)) {
            $rediret_to = 'admin.php?page=wedevs-academy&address-deleted=true';
        } else {
            $rediret_to = 'admin.php?page=wedevs-academy&address-deleted=false';
        }

        wp_redirect($rediret_to);
        exit;
    }
}
