<?php get_header(); ?>
<?php
// check if we are on a single property page
if (is_singular('properties')) {
    update_property_views_count(get_the_ID());
}


// display the views count
$property_id = get_the_ID();
$views_count = get_post_meta($property_id, 'property_views_count', true);
echo '<div class="property-views-count">Views: ' . intval($views_count) . '</div>';

?>

<!-- rest of design -->
<div class="property-single">
    <main class="property-main">
        <div class="property-card">
            <div class="property-primary">
                <header class="property-header">
                    <h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="property-meta">
                        <span class="meta-location">Ovcha Kupel, Sofia</span>
                        <span class="meta-total-area">Price:
                            <?php the_field('price'); ?> €/sq.m
                        </span>
                    </div>

                    <div class="property-details grid">
                        <div class="property-details-card">
                            <div class="property-details-card-title">
                                <h3>Rooms</h3>
                            </div>
                            <div class="property-details-card-body">
                                <ul>
                                    <li>2 Bedrooms</li>
                                    <li>1 Bathroom</li>
                                    <li>1 Living room</li>
                                    <li>Separated kitchen</li>
                                </ul>
                            </div>
                        </div>
                        <div class="property-details-card">
                            <div class="property-details-card-title">
                                <h3>Additional Details</h3>
                            </div>
                            <div class="property-details-card-body">
                                <ul>
                                    <li>Floor: 6</li>
                                    <li>Elevator/Lift</li>
                                    <li>Brick-built</li>
                                    <li>Electricity</li>
                                    <li>Water Supply</li>
                                    <li>Heating</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </header>

                <div class="property-body">
                 <?php the_content(); ?>
                </div>
            </div>
        </div>
    </main>
    <aside class="property-secondary">
        <div class="property-image property-image-single">
            <div class="property-image-box property-image-box-single">
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('medium');
                } else {
                    echo '<div class="no-image-uploaded">No image uploaded</div>';
                }
                ?>
            </div>
        </div>
        <a href="#" class="button button-wide">Like the property</a>
    </aside>
</div>
 
<!-- Dinamically generated content -->
<h2 class="section-heading">Other similar properties:</h2>
<?php
$args = array(
    'post_type' => 'properties',
    'posts_per_page' => 2, 
    'orderby' => 'date',
    'order' => 'DESC',
);

$properties_query = new WP_Query($args);

if ($properties_query->have_posts()) : ?>
    <ul class="properties-listing">
        <?php while ($properties_query->have_posts()) : $properties_query->the_post(); ?>
            <li class="property-card">
                <div class="property-primary">
                    <h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="property-meta">
                    </div>
                    <div class="property-details">
                        <span class="property-date">Posted <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></span>
                    </div>
                </div>
                <div class="property-image">
                    <div class="property-image-box">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('medium');
                        } else {
                            echo '<div class="no-image-uploaded">No image uploaded</div>';
                        }
                        ?>
                    </div>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p><?php _e('No properties found.', 'softuni-rent'); ?></p>
<?php endif; ?>


<?php get_footer(); ?>