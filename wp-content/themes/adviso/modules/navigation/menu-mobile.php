<a href="#menu" class="menu-link mdl-button mdl-js-button mdl-button--fab"><i class="fa fa-bars"></i></a>
<a class="panel_hide_button push"><i class="fa fa-times"></i></a>

<nav id="menu" class="panel" role="navigation">
    <?php
    // Get the Appropriate Walker First
    $walker	=	has_nav_menu('mobile') ? new Adviso_Mobile_Menu : '';
		wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_class'	=> 'mdl-list', 'walker'	=> $walker ) ); ?>
</nav><!-- #site-navigation -->