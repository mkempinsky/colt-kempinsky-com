<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adviso
 */

get_header(); ?>

    <div id="primary" class="content-area <?php do_action('adviso_primary-width') ?>">
        <header class="page-header">
            <?php
            the_archive_title( '<h2 class="page-title">', '</h2>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
            ?>
        </header><!-- .page-header -->
        <main id="main" class="site-main <?php do_action('adviso_main-class') ?>" role="main">

		<?php
		if ( have_posts() ) : ?>


			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
                do_action('adviso_blog_layout');

			endwhile;

			the_posts_pagination();

		else :

			get_template_part( 'modules/content/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
