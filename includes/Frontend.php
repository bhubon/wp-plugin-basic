<?php

namespace WeDevs\Academy;

/**
 * Frontend handler
 */
class Frontend{

    /**
     * Initialize the class
     */
    function __construct()
    {
        new Frontend\Shortcode();
        new Frontend\Enquery();
    }
}