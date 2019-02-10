<?php if ( class_exists('woocommerce') && get_theme_mod('adviso_product_enable') == 'enable' && is_front_page() ): ?>
    
	<div id="featured-products" class="container">
		<?php if (get_theme_mod('adviso_product_title') !='') : ?>
		    <div class="section-title title-font">
		        <span><?php echo esc_html( get_theme_mod('adviso_product_title',__('Most Selling','adviso')) ); ?></span>
		    </div>
	    <?php endif; ?>

    
	    
	    <div class="products-container">
	        <?php
	        $args = array(
	            'post_type' => 'product',
	            'posts_per_page' => 4,
	            'tax_query' => array(
	                array(
	                    'taxonomy'      => 'product_cat',
	                    'terms'         => esc_html( get_theme_mod('adviso_product_cat' ) ),
	                    'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
	                )
	            )
	        );
	        $loop = new WP_Query( $args );
	        while ( $loop->have_posts() ) :
	            $loop->the_post();
	            global $product;
	
	            ?>
	            <div class="item-wrapper col-md-3 col-sm-6 col-xs-10">
	                <div class="item">
	                    <div class="product-thumb mdl-shadow--2dp">
		                    <?php if (has_post_thumbnail()) : ?>
		                        <a href="<?php the_permalink(); ?>" class="mdl-card__media" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('adviso-sq-thumb', array(  'alt' => trim(strip_tags( $post->post_title )))); ?></a>
		                    <?php else: ?>
		                        <a href="<?php the_permalink(); ?>" class="mdl-card__media" title="<?php the_title_attribute() ?>"><img src="<?php echo esc_url( get_template_directory_uri() . "/assets/images/placeholder.png" ); ?>" alt="<?php the_title(); ?>"></a>
		                    <?php endif; ?>
		                    <span class="price"><?php echo $product->get_price_html(); ?></span>
	                    </div>
	                   <div class="thumb-info">
		                   <div class="product-title">
		                        <div><?php the_title(); ?></div>
		                    </div>
		                    <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
	                    </div>
	                </div>
	            </div><!--.featured-thumb-->
	
	        <?php
	        endwhile; ?>
	        <?php wp_reset_postdata(); ?>
	    </div>
	</div>
<?php endif; ?>