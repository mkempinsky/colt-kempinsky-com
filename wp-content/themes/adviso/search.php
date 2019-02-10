<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package adviso
 */

get_header(); ?>

	<section id="primary" class="content-area <?php do_action('adviso_primary-width'); ?>">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Results for: %s', 'adviso' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'framework/layouts/content', 'blog' );

			endwhile;

			the_posts_pagination();

		else :

			get_template_part( 'modules/content/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
