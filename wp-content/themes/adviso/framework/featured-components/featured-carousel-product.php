<?php
//Carousel
?>
<?php if ( class_exists('woocommerce') && get_theme_mod('adviso_product_eta_enable') == 'enable' && is_front_page() ) : ?>
    <?php if (get_theme_mod('adviso_product_eta_title')) : ?>
        <div class="section-title title-font">
            <?php echo esc_html( get_theme_mod('adviso_product_eta_title' ) ) ?>
        </div>
    <?php endif; ?>
    <div id="featured-offers-product" class="featured-section-area">
        <div class="delta-container container">

            <div id="owl-product" class="owl-carousel owl-theme">
                <?php
                $count = 1;
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 12,
                    'tax_query' => array(
                        array(
                            'taxonomy'      => 'product_cat',
                            'terms'         => esc_html( get_theme_mod('adviso_product_eta_cat' ) ),
                            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                        )
                    )
                );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) :
                    $loop->the_post();
                    global $product;
                    
                    ?>

                    <div class="fg-item-container">
                        <div class="fg-item mdl-shadow--2dp">
                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
                                <div class="featured-thumb">
                                    <?php if(has_post_thumbnail()):
                                        the_post_thumbnail('adviso-sq-thumb');
                                    else: ?>
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder2.jpg' ); ?> />
                                    <?php endif; ?>
                                </div>
								<div class="out-thumb mdl-card__supporting-text">
                                    <div class="product-title">
	                                    <?php the_title(); ?>
	                                </div>
                                    <span class="price"><?php echo $product->get_price_html(); ?></span>
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