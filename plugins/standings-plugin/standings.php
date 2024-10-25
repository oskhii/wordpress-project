<?php
/*
Plugin Name: Standings Plugin
Description: Plugin for league tables and player stats.
Author: Oskar Hiismäki
*/

require_once('includes/standings-post-type.php');
require_once('includes/standings-shortcodes.php');
require_once('includes/standings-widget.php');

function standingsplugin_setup_menu() {
    add_menu_page('Standings Widget', 'Standings', 'manage_options', 'standings-widget', 'standingsplugin_display_admin_page');
}

function standingsplugin_display_admin_page() {
    echo '<h1>Standings Plugin</h1>';
    echo '<p>Add shortcode [standings-widget] to page or article to show all standings or [standings-widget category="your category"] to show standings of a specific category.</p>';
}

add_action('admin_menu', 'standingsplugin_setup_menu');

function standingsplugin_assets() {
    wp_enqueue_style('standingsplugin-css', plugin_dir_url(__FILE__) . 'css/standings-plugin.css');
}

add_action('wp_enqueue_scripts', 'standingsplugin_assets');
?>