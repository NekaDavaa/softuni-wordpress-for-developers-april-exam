<?php
/**
 * Custom Post Type Properties
 */

class CustomPostTypeProperties {
    public function __construct() {
        add_action('init', array($this, 'register_properties_post_type'));
        add_action('init', array($this, 'register_properties_taxonomies'));
    }

    public function register_properties_post_type() {
        $labels = array(
            'name' => __( 'Properties', 'softuni-rent' ),
            'singular_name' => __( 'Property', 'softuni-rent' ),
            'menu_name'             => _x( 'Property', 'Admin Menu text', 'softuni-rent' ),
            'name_admin_bar'        => _x( 'Property', 'Add New on Toolbar', 'softuni-rent' ),
            'add_new'               => __( 'Add New', 'softuni-rent' ),
            'add_new_item'          => __( 'Add New Property', 'softuni-rent' ),
            'new_item'              => __( 'New Property', 'softuni-rent' ),
            'edit_item'             => __( 'Edit Property', 'softuni-rent' ),
            'view_item'             => __( 'View Property', 'softuni-rent' ),
            'all_items'             => __( 'All Property', 'softuni-rent' ),
        );

    	$args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'properties' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions' ),
            'show_in_rest'       => true
        );

        register_post_type('properties', $args);
    }


    public function register_properties_taxonomies() {
        // Property Types taxonomy
        $property_type_labels = array(
            'name' => __( 'Property Types', 'softuni-rent' ),
            'singular_name' => __( 'Property Type', 'softuni-rent' ),
        );
    
        $property_type_args = array(
            'labels' => $property_type_labels,
            'public' => true,
            'hierarchical' => true,
            'show_in_rest' => true,
        );
    
        register_taxonomy('property_type', 'properties', $property_type_args);
    }
}
    

new CustomPostTypeProperties();

