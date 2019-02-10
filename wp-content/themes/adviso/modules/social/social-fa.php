<?php
/*
** Template to Render Social Icons on Top Bar
*/
?>

<ul>
	<?php
	for ($i = 1; $i < 8; $i++) : 
		$social = get_theme_mod('adviso_social_'.$i);
		$social_url = get_theme_mod('adviso_social_url'.$i);
		if ( ($social != 'none') && ($social != '') && ($social_url !='' ) ) : ?>
		    
	            <li>
	                <a class="hvr-sweep-to-bottom" href="<?php echo esc_url($social_url); ?>" target="_blank">
	                    <i class="fa fa-fw fa-<?php echo esc_attr($social); ?>"></i>
	                </a>
	            </li>
		<?php endif;
	
	endfor; ?>
</ul>