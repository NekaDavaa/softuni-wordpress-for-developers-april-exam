<?php
// Loading styles and scripts
function softuni_assets() {
    wp_enqueue_style( 'softuni-rent', get_stylesheet_directory_uri() . '/assets/sass/master.scss', array(), filemtime(  get_template_directory() . '/assets/sass/master.scss' ) );
}
add_action( 'wp_enqueue_scripts', 'softuni_assets' );


// Registering menus
function renthome_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu Name', 'softuni' ),
        'footer_menu'  => __( 'Footer Menu', 'softuni' ),
    ) );
}
add_action( 'after_setup_theme', 'renthome_register_nav_menu', 0 );
