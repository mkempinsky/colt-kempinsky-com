<nav id="site-navigation" class="main-navigation col-md-8 col-sm-8 col-xs-12" role="navigation">
    <?php
    // Get the Appropriate Walker First.
    $walker = has_nav_menu('primary') ? new adviso_Menu_With_Icon : '';
    //Display the Menu.
    wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>
</nav><!-- #site-navigation -->