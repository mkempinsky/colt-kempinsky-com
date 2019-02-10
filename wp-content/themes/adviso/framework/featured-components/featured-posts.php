<?php if ( get_theme_mod('adviso_featposts_enable') == 'enable' && is_front_page() ) : ?>

<div class="featposts container-fluid container">
    <div class="section-title title-font">
        <span><?php echo esc_html( get_theme_mod('adviso_featposts_heading',__('Trending','adviso')) ); ?></span>
    </div>

	<?php if ( have_posts() ) : ?>
	
				<?php /* Start the Loop */  ?>
				<?php
	    		$args = array( 'posts_per_page' =>  3, 'category' => esc_html(get_theme_mod('adviso_featposts_cat')) );
				$lastposts = get_posts( $args );
				foreach ( $lastposts as $post ) :
				  setup_postdata( $post ); ?> 	
						
				<article id="post-<?php the_ID(); ?>" <?php post_class('item col-md-4 col-sm-4 col-xs-12'); ?>>

					<div class="item-container">
                        <div class="featured-thumb">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('adviso-sq-thumb', array(  'alt' => trim(strip_tags( $post->post_title )))); ?></a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo esc_url( get_template_directory_uri() . "/assets/images/placeholder.png" ); ?>" alt="<?php the_title(); ?>"></a>

                            <?php endif; ?>
                        </div>

                        <div class="out-thumb">
                            <h3><a class="post-title" href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></h3>
                            <div class="postedon">
                                <i class="fa fa-calendar"></i><?php adviso_posted_on_date(); ?>
                            </div>
                            <div class="postedby">
                                <i class="fa fa-user"></i><?php the_author(); ?>
                            </div>
                        </div>
					</div>
                    <div class="item-container-background"></div>

				</article><!-- #post-## -->
					
				<?php endforeach;
					wp_reset_postdata(); ?>
	
			<?php endif; ?>

</div>

<?php endif; ?>