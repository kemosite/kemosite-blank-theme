<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <body>
 *
 * Opens "grid-container"
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<!-- Set the viewport width to device width for mobile -->
<meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

<title><?php wp_title(); ?><?php bloginfo( 'name' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />

<!-- favicon.ico in the root directory -->

<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

<!-- Turn off the layout until the page has loaded -->
<style>
.grid-container { display: none; }
</style>

</head>

<body <?php body_class(); ?>>
<div class="grid-container">

<!-- Start Top Bar -->
<div class="top-bar">
	<div class="top-bar-left">
		<div class="grid-x">
			<div class="shrink cell">
				<ul class="dropdown menu" data-dropdown-menu>
					<li class="menu-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></li>
				</ul>
			</div>
			<?php if ( has_nav_menu( 'top-bar-menu' ) ) : ?>
			<div class="auto cell">
				<?php wp_nav_menu( array(
					'theme_location' => 'top-bar-menu',
					'menu_id' => 'top-bar-menu',
					'menu_class' => 'dropdown menu',
					'container' => 'nav',
					'walker' => new mega_menu_walker()
				) ); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="top-bar-right">
		<div class="grid-x">
			<div class="shrink cell">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div>
<!-- End Top Bar -->