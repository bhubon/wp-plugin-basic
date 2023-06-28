<?php

namespace WeDevs\Academy\Frontend;


/**
 * Enquery class
 */
class Enquery {

    /**
     * Initialize the class
     */
    function __construct() {
        add_shortcode('academy-enquery', [$this, 'render_shortcode']);
    }

    /**
     * Shortcode handle class
     *
     * @param array $atts
     * @param string $content
     * @return string
     */
    public function render_shortcode($atts, $content = '') {
        wp_enqueue_style('academy-enquery-style');
        wp_enqueue_script('academy-enquery-script');

        ob_start();

        include __DIR__.'/Views/enquery.php';

        return ob_get_clean();
    }
}
