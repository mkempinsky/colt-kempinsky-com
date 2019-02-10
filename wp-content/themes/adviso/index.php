<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adviso
 */

get_header(); ?>

	<div id="primary" class="content-area <?php do_action('adviso_primary-width') ?>">
		<main id="main" class="site-main <?php do_action('adviso_main-class') ?>" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h2 class="page-title screen-reader-text"><?php single_post_title(); ?></h2>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
                do_action('adviso_blog_layout');

			endwhile;

		else :

			get_template_part( 'modules/content/content', 'none' );

		endif; ?>

		</main><!-- #main -->

        <?php if ( have_posts() ) { the_posts_pagination(array( 'mid_size' => 2 )); } ?>

    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
