<?php

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

