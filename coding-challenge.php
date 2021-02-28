<?php
/**
 * Plugin Name: Coding Challenge
 * Plugin URI: https://github.com/reneroboter/coding-challenge
 * Description: A little plugin for the coding challenge at axel springer
 * Version: 1.0
 * Author: René Backhaus
 * Author URI: https://rene-backhaus.de
 **/

use RenéRoboter\CodingChallenge\CodingChallenge;

defined('ABSPATH') || exit;
if (!defined('CC_PLUGIN_DIRECTORY')) {
    define('CC_PLUGIN_DIRECTORY', plugin_dir_path(__FILE__));
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    $loader = require __DIR__ . '/vendor/autoload.php';
    $loader->addPsr4('RenéRoboter\\CodingChallenge\\', __DIR__ . '/src');
}

$codingChallenge = new CodingChallenge();
