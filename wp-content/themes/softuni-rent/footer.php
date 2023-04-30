<footer class="site-footer">
			<p>&copy; Copyright 2023 | Developer links: 
				<a href="/edits.html">Edits</a>,
				<a href="/index.html">Home</a>,
				<a href="/single.html">Single</a>
			</p>

			<div class="header-nav-menu">
                        <?php
                        if ( has_nav_menu( 'primary_menu' ) ) {
                                wp_nav_menu(
                                        array(
                                                'theme_location' => 'primary_menu',
                                        )
                                );
                        }
                        ?>
                </div>
		</footer>
	</div>

</body>
</html>