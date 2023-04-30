<?php get_header(); ?>
<?php the_archive_title(); ?>
<div id="custom-archive-content">
    <ul class="properties-listing">All archive blog posts:
        <?php
        // wp query for the archive blog posts
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 20,
        );


        $homepage_query = new WP_Query($args);

        // loop for the archive blog posts
        if ($homepage_query->have_posts()):
            while ($homepage_query->have_posts()):
                $homepage_query->the_post();
                ?>
                <li class="property-card">
                    <div class="property-primary">
                        <h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="property-meta">
                            <span class="meta-location">
                                <?php the_field('location'); ?>
                            </span>
                            <span class="meta-total-area">
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                    <?php the_author(); ?>
                                </a>
                            </span>

                        </div>
                        <div class="property-details">
                            <span class="property-price">Cena</span>
                            <span class="property-date">Posted
                                <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                            </span>
                        </div>
                    </div>
                    <div class="property-image">
                        <div class="property-image-box">
                            <?php if (has_post_thumbnail()): ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <?php
            endwhile;
        else:
            ?>
            <p>
                <?php _e('No posts found.', 'softuni'); ?>
            </p>
            <?php
        endif;


        wp_reset_postdata();
        ?>
    </ul>
</div>


<?php get_footer(); ?>