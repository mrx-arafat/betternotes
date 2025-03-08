<?php
/*
Plugin Name: BetterNotes
Description: A simple plugin for managing notes.
Version: 1.0
Author: Easin Arafat
*/


function betternotes_register_cpt()
{
    $labels = [
        'name' => 'BetterNotes',
        'singular_name' => 'BetterNote',
        'add_new' => 'Add New Note',
        'add_new_item' => 'Add New Note',
        'menu_name' => 'BetterNotes',
        'name_admin_bar' => 'BetterNotes',
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'menu_position' => 5,
        'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite' => ['slug' => 'betternotes'],
        'has_archive' => true,
    ];

    register_post_type('notes', $args);
}
add_action('init', 'betternotes_register_cpt');


register_activation_hook(__FILE__, function () {

    betternotes_register_cpt();

    flush_rewrite_rules();
});


register_deactivation_hook(__FILE__, function () {


    flush_rewrite_rules();
});


register_uninstall_hook(__FILE__, 'betternotes_uninstall');

function betternotes_uninstall() {}


function betternotes_enqueue_assets()
{

    $plugin_url = plugins_url('/', __FILE__) . 'BETTERNOTES/';


    wp_enqueue_style('betternotes-style', $plugin_url . 'assets/css/style.css', [], '1.0', 'all');


    wp_enqueue_script('betternotes-script', $plugin_url . 'assets/js/script.js', ['jquery'], '1.0', true);
}
add_action('wp_enqueue_scripts', 'betternotes_enqueue_assets');
