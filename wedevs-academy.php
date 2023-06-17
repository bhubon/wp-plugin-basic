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

final class WeDevsAcademy
{
    function __construct()
    {
    }

    /**
     * Initializes a singleton instance
     *
     * @return WeDevs_Academy
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }
        return $instance;
    }
}
