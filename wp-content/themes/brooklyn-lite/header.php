<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Brooklyn Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'brooklyn-lite' ); ?></a>

    <header class="main-header">
        <div class="container">
            <nav class="navbar navbar-expand-md">
            	
                <?php brooklyn_lite_brand_logo();?>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse main-menu" id="main-menu" role="navigation" aria-label="<?php _e( 'Main Menu', 'brooklyn-lite' ); ?>">
                    <?php
                      wp_nav_menu(array(
                            'theme_location'    => 'main-menu',
                            'depth'             => 5,
                            'container'         => false,
                            'container'         => '',
                            'container_class'   => '',
                            'menu_class'        => 'navbar-nav pwpt-main-menu',
                            'walker'            => new WP_Bootstrap_Navwalker(),
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'items_wrap'        => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>'
                        ));
                    ?>
                </div>

            </nav>
        </div><!-- /.container -->
    </header><!-- /.main-header -->

    <?php 
        if(!empty(get_theme_mod('brooklyn_lite_breadcrumbs'))){
            if( !is_home() && !is_front_page()){
                get_template_part( "blog","header" );    
            }        
        }
    ?>