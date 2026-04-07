<?php

function arcada_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
    
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'arcada'),
        'footer' => __('Footer Menu', 'arcada'),
    ));
    
    add_image_size('arcada-featured', 1200, 600, true);
    add_image_size('arcada-thumbnail', 400, 300, true);
}
add_action('after_setup_theme', 'arcada_theme_setup');

function arcada_scripts() {
    wp_enqueue_style('arcada-style', get_stylesheet_uri());
    wp_enqueue_script('arcada-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'arcada_scripts');

function arcada_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widgets', 'arcada'),
        'id'            => 'footer-widgets',
        'description'   => __('Add widgets here to appear in footer', 'arcada'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'arcada_widgets_init');
