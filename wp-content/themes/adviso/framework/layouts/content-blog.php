<?php
/**
 * @package Adviso
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid'); ?>>

		<div class="featured-thumb mdl-shadow--2dp col-md-4 col-sm-4 col-xs-6">
			<?php if (has_post_thumbnail()) : ?>	
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('adviso-sq-thumb'); ?></a>
			<?php else: ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo esc_url( get_template_directory_uri()."/assets/images/placeholder.png" ); ?>" alt="<?php the_title(); ?>"></a>
			<?php endif; ?>
			
		</div><!--.featured-thumb-->
			
		<div class="out-thumb col-md-8 col-sm-8 col-xs-6">
			<header class="entry-header mdl-card__title">
                <h3 class="entry-title title-font mdl-card__title-text"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            </header><!-- .entry-header -->
            <div class="postedon"><?php adviso_posted_on(); ?></div>
            <p class="entry-excerpt"><?php $post->post_excerpt == '' ? adviso_excerpt(90) : the_excerpt();?></p>
            <div class="readmore"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','adviso'); ?></a></div>
		</div><!--.out-thumb-->
		
</article><!-- #post-## -->