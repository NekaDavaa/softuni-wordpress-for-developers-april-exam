<?php

function softuni_assets() {
    wp_enqueue_style( 'softuni-rent', get_stylesheet_directory_uri() . '/assets/sass/master.scss', array(), filemtime(  get_template_directory() . '/assets/sass/master.scss' ) );
}
add_action( 'wp_enqueue_scripts', 'softuni_assets' );