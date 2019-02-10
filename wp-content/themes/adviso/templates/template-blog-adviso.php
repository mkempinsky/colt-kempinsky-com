<?php
/**
 *
 *	Page template for Default Layout.
 *
 *	Template Name: Adviso Layout
 *
**/

get_header(); ?>

	<div id="primary" class="content-area <?php echo esc_attr( adviso_primary_class() ); ?>">
		<main id="main" class="site-main">

			<header class="entry-header">
	            <?php the_title( '<h1 class="template-entry-title section-title">', '</h1>' ); ?>
	        </header><!-- .entry-header -->
	        
	        <?php
	        $qa = array (
	            'post_type'              => 'post',
	            'ignore_sticky_posts'    => false,
	            'paged' 				 => $paged,
	        );
	
	        // The Query
	        $recent_articles = new WP_Query( $qa );
	        if ( $recent_articles->have_posts() ) : ?>
	
	            <?php /* Start the Loop */ ?>
	            <?php while ( $recent_articles->have_posts() ) : $recent_articles->the_post(); ?>
	
	                <?php
	                /* Include the Post-Format-specific template for the content.
	                 */
	                get_template_part('framework/layouts/content', 'adviso');
	
	                ?>
	
	            <?php endwhile; ?>
	            <?php wp_reset_postdata(); ?>
	
	        <?php else : ?>
	
	            <?php get_template_part( 'content', 'none' ); ?>
	
	        <?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

