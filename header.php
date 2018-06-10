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
.off-canvas-wrapper { display: none; }
</style>

</head>

<body <?php body_class(); ?>>

<div class="off-canvas-wrapper">

<!--
[Define Tablet Top-Bar Menu]
[Define Desktop Top-Bar Mega-Menu]
-->

<!-- [Mobile Off-Canvas Menu] -->
<div class="off-canvas position-left" id="off_canvas_mobile_menu" data-off-canvas>

	<!-- Close button -->
    <button class="close-button" aria-label="Close menu" type="button" data-close>
		<span aria-hidden="true">&times;</span>
    </button>

    <!--
    <ul class="vertical menu">
      <li><a href="#">Foundation</a></li>
      <li><a href="#">Dot</a></li>
      <li><a href="#">ZURB</a></li>
      <li><a href="#">Com</a></li>
      <li><a href="#">Slash</a></li>
      <li><a href="#">Sites</a></li>
    </ul>
	-->

    <?php if ( has_nav_menu( 'off-canvas-menu' ) ) : ?>
    	<?php wp_nav_menu( array(
			'theme_location' => 'off-canvas-menu',
			'menu_id' => 'off-canvas-menu',
			'menu_class' => 'vertical menu off-canvas-menu clear-off-canvas-close-button',
			'container' => 'nav',
			'walker' => new off_canvas_menu_walker()
		) ); ?>
	<?php endif; ?>

</div>

<!-- [Mobile Off-Canvas Menu] -->
<div class="off-canvas position-right" id="off_canvas_mobile_search" data-off-canvas>

	<!-- Close button -->
    <button class="close-button" aria-label="Close menu" type="button" data-close>
		<span aria-hidden="true">&times;</span>
    </button>

    <div class="grid-x clear-off-canvas-close-button">
    	<div class="cell"><?php get_search_form(); ?></div>
    </div>

</div>

<div class="off-canvas-content" data-off-canvas-content>
	
<!-- Your page content lives here -->

<div class="grid-layout-container">

	<div class="main_mobile_menu hide-for-large">

		<button type="button" class="button large" data-toggle="off_canvas_mobile_menu"><i class="fi-list"></i></button>
		<button type="button" class="button large float-right" data-toggle="off_canvas_mobile_search"><i class="fi-magnifying-glass"></i></button>

	</div>

	<?php /*
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
	?>