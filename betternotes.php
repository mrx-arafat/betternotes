<?php
/*
Plugin Name: BetterNotes
Description: A plugin for managing notes with custom REST API endpoints.
Version: 1.0
Author: Easin Arafat
Text Domain: better-notes
*/


function betternotes_register_cpt()
{
    $labels = [
        'name' => esc_html__('BetterNotes', 'better-notes'),
        'singular_name' => esc_html__('BetterNote', 'better-notes'),
        'add_new' => esc_html__('Add New Note', 'better-notes'),
        'add_new_item' => esc_html__('Add New Note', 'better-notes'),
        'menu_name' => esc_html__('BetterNotes', 'better-notes'),
        'name_admin_bar' => esc_html__('BetterNotes', 'better-notes'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'menu_position' => 5,
        'show_in_menu' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'page-attributes'],
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
