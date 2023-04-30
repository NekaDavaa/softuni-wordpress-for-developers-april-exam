<?php
// Loading any scripts and adding ajax url
function softuni_enqueue_scripts() {
	wp_enqueue_script( 'softuni-script', plugins_url( 'assets/scripts/scripts.js', __FILE__ ), array( 'jquery' ), 1.1 );
	wp_localize_script( 'softuni-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'softuni_enqueue_scripts' );


// ajax function for like button
function softuni_property_like() {
    $property_id = esc_attr( $_POST['property_id'] );

    $like_number = get_post_meta( $property_id, 'property_likes', true );

    if ( empty( $like_number ) ) {
        update_post_meta( $property_id, 'property_likes', 1 );
    } else {
        $like_number = $like_number + 1;
        update_post_meta( $property_id, 'property_likes', $like_number );
    }

    wp_die();
}
add_action( 'wp_ajax_nopriv_softuni_property_like', 'softuni_property_like' );
add_action( 'wp_ajax_softuni_property_like', 'softuni_property_like' );





// adding shortcode
function softuni_rent_property_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'id' => '',
        ),
        $atts,
        'property'
    );


    if (empty($atts['id'])) {
        return __( 'Property ID is required.', 'softuni-rent' );
    }


    $property = get_post($atts['id']);

    if (!$property || $property->post_type !== 'properties') {
        return __( 'Invalid property ID.', 'softuni-rent' );
    }


    $property_title = get_the_title($property);
    $property_image = get_the_post_thumbnail_url($property);
    $property_url = get_permalink($property);


    $output = '<div class="property-shortcode">';
    $output .= '<h3><a href="' . esc_url( $property_url ) . '">' . esc_html( $property_title ) . '</a></h3>';
    if ($property_image) {
        $output .= '<img src="' . esc_url( $property_image ) . '" alt="' . esc_attr( $property_title ) . '">';
    }
    $output .= '</div>';

    return $output;
}

add_shortcode( 'property', 'softuni_rent_property_shortcode' );

// function for views count
function update_property_views_count( $property_id ) {
    $current_views_count = get_post_meta( $property_id, 'property_views_count', true );
    if (empty( $current_views_count )) {
        $current_views_count = 0;
    }
    $new_views_count = $current_views_count + 1;
    update_post_meta( $property_id, 'property_views_count', $new_views_count );
}

// filter
function softuni_rent_modify_post_title($title, $id = null) {
    // Check if the post type is 'post'
    if (get_post_type($id) === 'post') {
        $prefix = 'SoftUni BlogPost: ';
        $title = $prefix . $title;
    }
    
    return $title;
}
add_filter('the_title', 'softuni_rent_modify_post_title', 10, 2);



