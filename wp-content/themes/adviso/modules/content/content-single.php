<?php
/**
 * @package adviso
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class() ; ?>>

    <header class="entry-header">
        <?php the_title( '<h2 class="entry-title title-font">', '</h2>' ); ?>


        <div class="entry-meta">
            <?php adviso_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'adviso' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php adviso_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
