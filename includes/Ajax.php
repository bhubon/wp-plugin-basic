<?php

namespace WeDevs\Academy;

/**
 * Ajax handle class
 */
class Ajax {

    function __construct() {
        add_action('wp_ajax_wd_academy_enquiry', [$this, 'submit_enquery']);
    }

    public function submit_enquery() {


        if (!wp_verify_nonce($_REQUEST['_wpnonce'], 'wd-ac-enquiry-form')) {
            wp_send_json_error([
                'message' => __('Nonce verification failed', 'wedevs-academy')
            ]);
        }

        exit;
    }
}
