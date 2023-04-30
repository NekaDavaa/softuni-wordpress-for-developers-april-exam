<?php
/* Template Name: Custom Properties */
?>

<?php get_header(); ?>
<p style="font-size:1.2rem;">All properties-listing</p>

<ul class="properties-listing">
    <?php
    $args = array(
        'post_type' => 'properties',
        'posts_per_page' => -1, 
    );
    $properties_query = new WP_Query($args);

    if ($properties_query->have_posts()) :
        while ($properties_query->have_posts()) : $properties_query->the_post();
            ?>
            <li class="property-card">
                <div class="property-primary">
                    <h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="property-meta">
                        <span class="meta-total-area">To show the price was used ACF</span>
                    </div>
                    <div class="property-details">
                        <span class="property-price">&euro; <?php the_field('price'); ?></span>
                        <span class="property-date">Posted <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></span>
                    </div>
                </div>
                <div class="property-image">
                    <div class="property-image-box">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                </div>
            </li>
        <?php
        endwhile;
    else :
        ?>
        <p><?php _e('No properties found.', 'softuni-rent'); ?></p>
    <?php
    endif;

    
    wp_reset_postdata();
    ?>
</ul>


<?php get_footer(); ?>