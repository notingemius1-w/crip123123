<?php

function arcada_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('.align-wide');
    
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'arcada'),
        'footer' => __('Footer Menu', 'arcada'),
    ));
    
    add_image_size('arcada-featured', 1200, 600, true);
    add_image_size('arcada-thumbnail', 400, 300, true);
    
    if (!isset($content_width)) {
        $content_width = 1200;
    }
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
    
    register_sidebar(array(
        'name'          => __('Consultation Form', 'arcada'),
        'id'            => 'consultation-form',
        'description'   => __('Place Contact Form 7 widget here', 'arcada'),
        'before_widget' => '<div class="consultation-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'arcada_widgets_init');

function arcada_customizer($wp_customize) {
    $wp_customize->add_section('arcada_theme_options', array(
        'title'    => __('Arcada Theme Settings', 'arcada'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('arcada_primary_color', array(
        'default'   => '#0066cc',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arcada_primary_color', array(
        'label'    => __('Primary Color', 'arcada'),
        'section'  => 'arcada_theme_options',
        'settings' => 'arcada_primary_color',
    )));
    
    $wp_customize->add_setting('arcada_secondary_color', array(
        'default'   => '#333333',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arcada_secondary_color', array(
        'label'    => __('Secondary Color', 'arcada'),
        'section'  => 'arcada_theme_options',
        'settings' => 'arcada_secondary_color',
    )));
    
    $wp_customize->add_setting('arcada_phone', array(
        'default'   => '+380 44 502-33-35',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('arcada_phone', array(
        'label'    => __('Phone Number', 'arcada'),
        'section'  => 'arcada_theme_options',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('arcada_email', array(
        'default'   => 'common@arcada.com.ua',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('arcada_email', array(
        'label'    => __('Email', 'arcada'),
        'section'  => 'arcada_theme_options',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('arcada_address', array(
        'default'   => 'г. Киев, ул. Столичное шоссе, 103',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('arcada_address', array(
        'label'    => __('Address', 'arcada'),
        'section'  => 'arcada_theme_options',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'arcada_customizer');

function arcada_get_option($option, $default = '') {
    return get_theme_mod($option, $default);
}

function arcada_seo_meta() {
    if (is_singular()) {
        global $post;
        $description = get_the_excerpt($post);
        if ($description) {
            echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
        }
        
        if (get_the_tags($post)) {
            echo '<meta name="keywords" content="';
            $tags = get_the_tags($post);
            $tag_names = array();
            foreach ($tags as $tag) {
                $tag_names[] = $tag->name;
            }
            echo implode(', ', $tag_names);
            echo '">' . "\n";
        }
        
        if (has_post_thumbnail($post)) {
            $thumbnail = get_the_post_thumbnail_url($post, 'large');
            echo '<meta property="og:image" content="' . esc_url($thumbnail) . '">' . "\n";
        }
        
        echo '<meta property="og:title" content="' . esc_attr(get_the_title($post)) . '">' . "\n";
        echo '<meta property="og:url" content="' . esc_url(get_permalink($post)) . '">' . "\n";
        echo '<meta property="og:type" content="article">' . "\n";
    }
}
add_action('wp_head', 'arcada_seo_meta', 1);

function arcada_wc_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'arcada_wc_support');

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content', 'arcada_wc_wrapper_start');
add_action('woocommerce_after_main_content', 'arcada_wc_wrapper_end');

function arcada_wc_wrapper_start() {
    echo '<div class="woocommerce-wrapper"><div class="container"><div class="woocommerce-content">';
}

function arcada_wc_wrapper_end() {
    echo '</div></div></div>';
}

add_filter('woocommerce_enqueue_styles', '__return_empty_array');

function arcada_cart_count($fragments) {
    ob_start();
    ?>
    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    <?php
    $fragments['span.cart-count'] = ob_get_clean();
    return $fragments;
}
add_action('wp_ajax_arcada_update_cart_count', 'arcada_cart_count_ajax');
add_action('wp_ajax_nopriv_arcada_update_cart_count', 'arcada_cart_count_ajax');

function arcada_cart_count_ajax() {
    echo WC()->cart->get_cart_contents_count();
    wp_die();
}
