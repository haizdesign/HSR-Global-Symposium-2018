<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<script src="https://use.typekit.net/tqt8aaw.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<link rel="icon" href="http://healthsystemsresearch.org/hsr2018/favicon.png" type="image/png">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="outer">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

		<div id="header-search-container" class="search-box-wrapper clear hide">
		    <div class="search-box clear">
				<?php get_search_form(); ?>
			</div>
		</div>

		<header id="masthead" class="site-header">
			<div class="site-header-main site-inner">

				<div class="site-branding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="hsr2018 Global symposium on Health Systems Research"><figure class="banner-logo"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logos/banner-logo.svg" width="175" height="100" alt="HSR2018 logo" /></figure></a>
				</div><!-- .site-branding -->


				<?php if ( has_nav_menu( 'social' ) ) : ?>
					<nav id="social-navigation" class="social-navigation">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>',
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif; ?>

					<div class="search-toggle">
                        <i class="fa fa-search"></i>
                        <a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'haizdesign' ); ?></a>
                    </div>

					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>

					</div><!-- .site-header-menu -->

			</div><!-- .site-header-main -->

		</header><!-- .site-header -->

		<?php
			if ( is_page() ) : ?>

			<?php twentysixteen_post_thumbnail(); ?>

		<?php endif; ?>

		<div id="content" class="site-content site-inner">

			<?php if (get_field('app_page_link')) : ?>
			<div class="app-link">
				<a href="<?php the_field('app_page_link'); ?>" title="Download the app">Download the app</a>
			</div>
			<?php endif; ?>

		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
    		<?php if(function_exists('bcn_display'))
		    {
		        bcn_display();
		    }?>
		</div>
