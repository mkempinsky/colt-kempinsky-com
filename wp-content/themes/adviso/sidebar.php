<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adviso
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}


if ( adviso_load_sidebar() ) : ?>
<div id="secondary" class="widget-area <?php do_action('adviso_secondary-width') ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
<?php endif; ?>
