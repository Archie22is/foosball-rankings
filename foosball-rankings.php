<?php

/**
 * Plugin Name: Creative Spark Foosball Rankings
 * Plugin URI: http://www.creativespark.co.za/plugins/
 * Description: That plugin that helps other brag about their foosball skills on the internet...
 * Author: Archie Makuwa
 * Version: 1.00
 * Author URI: http://www.aatsol.co.za/
 */

// Post Type and Custom Fields
include plugin_dir_path( __FILE__ ) . '/inc/class-foosball-rankings-admin.php';

// Shortcode and Template Tag
#include plugin_dir_path( __FILE__ ) . '/inc/class-foosball.php';

// Widget
#include plugin_dir_path( __FILE__ ) . '/inc/class-bs-testimonials-widget.php';