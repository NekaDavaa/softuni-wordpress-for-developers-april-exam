<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Properties</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <title><?php wp_title( '' ); ?></title>
	<?php wp_head(); ?>
</head>
<body>
<div class="site-wrapper">
		<header class="site-header">
			<?php if ( is_home() ) : ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url( get_home_url() ); ?>">Rent Home</a>
                </h1>
            <?php else : ?>
                <p class="site-title">
                    <a href="<?php echo esc_url( get_home_url() ); ?>">Rent Home</a>
                </p>
            <?php endif; ?>

        <ul class="properties-listing">
			<li class="property-card">
				<div class="property-primary">
					<h2 class="property-title"><a href="#">Two-bedroom apartment</a></h2>
					<div class="property-meta">
						<span class="meta-location">Ovcha Kupel, Sofia</span>
						<span class="meta-total-area">Total area: 91.65 sq.m</span>
					</div>
					<div class="property-details">
						<span class="property-price">€ 100,815</span>
						<span class="property-date">Posted 14 days ago</span>
					</div>
				</div>
				<div class="property-image">
					<div class="property-image-box">
						<img src="images/bedroom.jpg" alt="property image">
					</div>
				</div>
			</li>

			<li class="property-card">
				<div class="property-primary">
					<h2 class="property-title"><a href="#">Two-bedroom apartment</a></h2>
					<div class="property-meta">
						<span class="meta-location">Ovcha Kupel, Sofia</span>
						<span class="meta-total-area">Total area: 91.65 sq.m</span>
					</div>
					<div class="property-details">
						<span class="property-price">€ 100,815</span>
						<span class="property-date">Posted 14 days ago</span>
					</div>
				</div>
				<div class="property-image">
					<div class="property-image-box">
						<img src="images/bedroom.jpg" alt="property image">
					</div>
				</div>
			</li>
		</ul>