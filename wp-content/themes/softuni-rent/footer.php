<footer class="site-footer">
			<p>&copy; Copyright 2023 | Developer links: 
                        <a href="https://github.com/NekaDavaa/softuni-wordpress-for-developers-april-exam" target="_blank">GitHub Repo</a>
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
                
                <hr>
                <h3>    <p> Project can be found at: </p>
                        <a href="https://github.com/NekaDavaa/softuni-wordpress-for-developers-april-exam" target="_blank">https://github.com/NekaDavaa/softuni-wordpress-for-developers-april-exam</a></h3>
                        <hr>
                        <h3>example of a dynamically fetched post using a shortcode</h3>
                <?php echo do_shortcode( '[property id="98"]' ); ?>	
        </footer>
	</div>


        


</body>
</html>