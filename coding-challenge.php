<?php
/**
 * Plugin Name: Coding Challenge
 * Plugin URI: https://github.com/reneroboter
 * Description: A little plugin for the coding challenge at axel springer
 * Version: 1.0
 * Author: René Backhaus
 * Author URI: https://rene-backhaus.de
 **/

use RenéRoboter\CodingChallenge\Controller\ExportController;

add_action('init', function () {
    register_post_type('book', [
        'labels' => [
            'name' => __('Books'),
            'singular_name' => __('Book'),
            'not_found' => __('No books found'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-book',
    ]);
});

add_action('admin_menu', function () {
    add_submenu_page('edit.php?post_type=book', __('Import'), __('Import'), 'manage_options', 'book_import', function () {
        echo '<h2> Import books </h2>';
    });
});

add_action('admin_menu', function () {
    add_submenu_page('edit.php?post_type=book', __('Export'), __('Export'), 'manage_options', 'book_export', function () {
        echo '<h2> Export books </h2>';
        echo (new ExportController())->export();
    });
});

