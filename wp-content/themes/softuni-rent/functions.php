<?php
// Loading styles and scripts
function softuni_assets() {
    wp_enqueue_style( 'softuni-rent', get_stylesheet_directory_uri() . '/assets/sass/master.scss', array(), filemtime(  get_template_directory() . '/assets/sass/master.scss' ) );
}
add_action( 'wp_enqueue_scripts', 'softuni_assets' );


// Registering menus
function register_rent_home() {
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu', 'text-domain')
        )
    );
}
add_action('after_setup_theme', 'register_rent_home');
