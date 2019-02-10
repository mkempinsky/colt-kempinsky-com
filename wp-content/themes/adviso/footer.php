<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adviso
 */

?>

	</div><!-- #content -->

    <?php get_sidebar('footer'); ?>
	<footer id="colophon" class="site-footer">
        <div class="container">
            <div class="site-info col-md-4 col-sm-4 col-xs-12">
                <?php printf( __( 'Theme Designed by %1$s.', 'adviso' ), '<a href="'.esc_url("https://inkhive.com/").'" rel="nofollow">InkHive</a>' ); ?>
                <span class="sep"></span>
                <?php echo ( get_theme_mod('adviso_footer_text') == '' ) ? ('&copy; '.date_i18n( __( 'Y', 'adviso' ) ).' '.get_bloginfo('name').__('. All Rights Reserved. ','adviso')) : esc_html(get_theme_mod('adviso_footer_text')); ?>
            </div><!-- .site-info -->
            <div class="footer-menu col-md-8 col-sm-8 col-xs-12">
                <nav id="site-navigation" class="main-navigation title-font col-md-8 col-sm-8 col-xs-12" role="navigation">
                    <?php
                    // Get the Appropriate Walker First.
                    $walker = has_nav_menu('primary') ? new adviso_Menu_With_Icon : '';
                    //Display the Menu.
                    wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
