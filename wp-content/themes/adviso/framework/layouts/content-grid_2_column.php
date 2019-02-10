<?php
/**
 * @package Adviso
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid_2_column'); ?>>

    <div class="featured-thumb mdl-shadow--2dp">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('adviso-offer-thumb'); ?></a>
        <?php else: ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo esc_url( get_template_directory_uri()."/assets/images/placeholder2.jpg" ); ?>" alt="<?php the_title(); ?>"></a>
        <?php endif; ?>
        <div class="postedon"><?php echo esc_html( adviso_time_ago() ); ?></div>
    </div><!--.featured-thumb-->
    
    <div class="out-thumb">
	     <header class="entry-header mdl-card__title	">
	        <h3 class="entry-title mdl-card__title-text"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	    </header><!-- .entry-header -->
       <p class="entry-excerpt"><?php $post->post_excerpt == '' ? adviso_excerpt(60) : the_excerpt();?></p>
        <span class="readmore"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','adviso'); ?></a></span>
    </div><!--.out-thumb-->



</article><!-- #post-## -->