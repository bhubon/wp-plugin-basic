<?php

namespace WeDevs\Academy\Frontend;

/**
 * Shortcode handle class
 */
class Shortcode {

    /**
     * Initialize the class
     */
    function __construct() {
        add_shortcode('wedevs-academy', [$this, 'render_shortcode']);
    }

    /**
     * Shortocode handle class
     *
     * @param array $atts
     * @param string $content
     * 
     * @return string
     */
    public function render_shortcode($atts, $content = '') {
        return "Hello From shortcode";
    }
}
