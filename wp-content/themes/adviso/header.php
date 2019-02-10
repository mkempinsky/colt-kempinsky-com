<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package adviso
 */
?>
<!-- Head -->
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="site">
	
    <!-- Masthead -->
    <?php get_template_part('modules/header/masthead'); ?>
    
    <?php if ( is_front_page() ) :
	    adviso_sorter();
	endif; ?>
	
    <div class="mega-container">

        <div id="content" class="site-content container">
