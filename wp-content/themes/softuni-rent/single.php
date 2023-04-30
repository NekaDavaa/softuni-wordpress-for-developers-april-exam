<?php get_header(); ?>

<p style="font-size:2rem;">single view of blogpost</p>
<div class="property-single">
			<main class="property-main">
				<div class="property-card">
					<div class="property-primary">
						<header class="property-header">
                        <h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						

							
				
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
				
			</aside>
		</div>

		

<?php get_footer(); ?>
