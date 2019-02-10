<?php
//Carousel
?>
<?php if ( get_theme_mod('adviso_eta_enable') == 'enable' && is_front_page() ) : ?>
    <?php if (get_theme_mod('adviso_eta_title')) : ?>
        <div class="section-title title-font">
            <?php echo esc_html( get_theme_mod('adviso_eta_title' ) ) ?>
        </div>
    <?php endif; ?>
    <div id="featured-offers" class="featured-section-area">
        <div class="delta-container container">

            <div id="owl-posts" class="owl-carousel owl-theme">
                <?php
                $count = 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 12,
                    'cat'  => esc_html( get_theme_mod('adviso_eta_cat') ),
                    'ignore_sticky_posts' => 1,
                );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) :
                    $loop->the_post();
                    ?>
                    <div class="fg-item-container">
                        <div class="fg-item mdl-card mdl-shadow--2dp">
                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
                                <div class="featured-thumb">
                                    <?php if(has_post_thumbnail()):
                                        the_post_thumbnail('adviso-offer-thumb');
                                    else: ?>
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder2.jpg' ); ?> "/>
                                    <?php endif; ?>
                                </div>
								<div class="out-thumb mdl-card__supporting-text">
                                    <?php the_title(); ?>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    $count++;
                endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>