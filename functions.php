<?php

define("KEMOSITE_BLANK_PARENT_STYLE", "twentyseventeen"); // This is 'twentyseventeen' for the Twenty Seventeen theme.
define( 'GITHUB_UPDATER_OVERRIDE_DOT_ORG', true ); // Override Dot Org will skip any updates from wordpress.org for plugins with identical slugs.

/* [Declare Depedencies] */
function kemosite_blank_theme_dependencies() {
 
	// Check for github-updater
	if (!is_plugin_active('github-updater/github-updater.php')):
		echo '<div class="error"><p>Warning: This theme needs the github-updater plugin to function.</p></div>';
	endif;

	// Check for kemosite-typography-plugin
	if (!is_plugin_active('kemosite-typography-plugin/index.php')):
		echo '<div class="error"><p>Warning: This theme needs the kemosite-typography-plugin to function.</p></div>';
	endif;
	//plugin is activated

}
add_action( 'admin_notices', 'kemosite_blank_theme_dependencies' );

/* [Includes] */
require_once ("functions-woocommerce.php");
require_once ("functions-enqueue-scripts.php");
require_once ("functions-dashboard-setup.php");
require_once ("functions-customize-register.php");
require_once ("functions-shortcodes.php");

/* [Define Menus] */
class off_canvas_menu_walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
    	
    	// Code for start_lvl goes here

    	$t = "\t";
    	$n = "\n";

    	$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

    	// Default class.
	    $classes 		=	array( 'sub-menu' );
	    $classes[]		=	'nested vertical menu';
	    $class_names	=	join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
	    $class_names	=	$class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    	
    	// $output .= "{$n}{$indent}<ul class=\"grid-x grid-padding-x small-up-2 medium-up-3 large-up-4\">{$n}";
    	$output .= "{$n}{$indent}<ul $class_names>{$n}";

	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    	
    	// Code for start_el goes here    	

    	$t = "\t";
    	$n = "\n";

    	$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    	$classes 		=	empty( $item->classes ) ? array() : (array) $item->classes;
	    $classes[]		=	'menu-item-' . $item->ID;

	    // if ($item->menu_item_parent > 0): $classes[] = 'cell'; endif;

	    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
	    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

	    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
	    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

	    $output .= $indent . '<li' . $id . $class_names .'>';

	    $atts = array();
	    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
	    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
	    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
	    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
	    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

	    $attributes = '';
	    foreach ( $atts as $attr => $value ) {
	        if ( ! empty( $value ) ) {
	            $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
	            $attributes .= ' ' . $attr . '="' . $value . '"';
	        }
	    }

	    $title = apply_filters( 'the_title', $item->title, $item->ID );
	    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
 
	    $item_output = $args->before;
	    $item_output .= '<a'. $attributes .'>';
	    $item_output .= $args->link_before . $title . $args->link_after;
	    $item_output .= '</a>';	    
	    $item_output .= $args->after;

	    // f ($item->description !== '' && $item->menu_item_parent > 0): $item_output .= '<p>'.esc_attr( $item->description ).'</p>'; endif;

	    /*
	    if (has_post_thumbnail($item->object_id) && $item->menu_item_parent > 0):
	    	$image = wp_get_attachment_image_src( get_post_thumbnail_id($item->object_id), 'single-post-thumbnail' );
	    	$item_output .= '<div><img style="width: 100%;" src="'.$image[0].'"></div>';
		endif;
		*/

	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	    /*
	    echo "<pre>";
    	print_r($item);
    	echo "<br><br>";
    	echo "<pre>";
    	*/

    }
 
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        
        // Code for end_el goes here
        
        /*
        $output .= "<pre>";
		print_r($item);
		echo "<br><br>";
		$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
    	$n = "\n";

    	$output .= "</li>{$n}";

    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
    	
    	// Code for end_lvl goes here
    	
    	/*
    	$output .= "<pre>";
    	$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
        $n = "\n";

	    $indent = str_repeat( $t, $depth );

	    $output .= "$indent</ul>{$n}";

    }

}

class mega_menu_walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
    	
    	// Code for start_lvl goes here
    	
    	/*
    	$output .= "<pre>";
    	$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
    	$n = "\n";

    	$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

    	// Default class.
	    $classes 		=	array( 'sub-menu' );
	    /*
	    $classes[]		=	'sub-mega-menu';
	    $classes[]		=	'grid-x';
	    $classes[]		=	'grid-margin-x';
	    $classes[]		=	'small-up-2';
	    $classes[]		=	'medium-up-3';
	    $classes[]		=	'large-up-4';
	    */
	    $classes[]		=	'submenu menu vertical';
	    $class_names	=	join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
	    $class_names	=	$class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    	
    	// $output .= "{$n}{$indent}<ul class=\"grid-x grid-padding-x small-up-2 medium-up-3 large-up-4\">{$n}";
    	$output .= "{$n}{$indent}<ul {$class_names} data-submenu>{$n}";

	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    	
    	// Code for start_el goes here

    	$t = "\t";
    	$n = "\n";

    	$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    	$classes 		=	empty( $item->classes ) ? array() : (array) $item->classes;
	    $classes[]		=	'menu-item-' . $item->ID;

	    // echo "<script>console.log(".json_encode($item).");</script>";
    	  
	    if ($item->menu_item_parent > 0): $classes[] = 'cell'; endif;
	    if ($args->walker->has_children > 0): $classes[] = 'has-submenu'; endif;

	    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
	    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

	    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
	    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

	    $output .= $indent . '<li' . $id . $class_names .'>';

	    $atts = array();
	    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
	    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
	    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
	    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
	    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

	    $attributes = '';
	    foreach ( $atts as $attr => $value ) {
	        if ( ! empty( $value ) ) {
	            $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
	            $attributes .= ' ' . $attr . '="' . $value . '"';
	        }
	    }

	    $title = apply_filters( 'the_title', $item->title, $item->ID );
	    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
 
	    $item_output = $args->before;
	    $item_output .= '<a'. $attributes .'>';
	    $item_output .= $args->link_before . $title . $args->link_after;
	    $item_output .= '</a>';	    
	    $item_output .= $args->after;

	    if ($item->description !== '' && $item->menu_item_parent > 0): $item_output .= '<p>'.esc_attr( $item->description ).'</p>'; endif;

	    // Need to get the properties of the post that the menu item links to. See if it has an image.
	    // => post_name: "73"

	    if (has_post_thumbnail($item->ID) && $item->menu_item_parent === "0"):
	    // if ($item->menu_item_parent === "0"):
	    	echo "<script>console.log('There should be an image here.');</script>";
	    	$image = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'single-post-thumbnail' );
	    	$item_output .= '<div><img style="width: 100%;" src="'.$image[0].'"></div>';
		endif;

	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );    	

    }
 
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        
        // Code for end_el goes here
        
        /*
        $output .= "<pre>";
		print_r($item);
		echo "<br><br>";
		$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
    	$n = "\n";

    	$output .= "</li>{$n}";

    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
    	
    	// Code for end_lvl goes here
    	
    	/*
    	$output .= "<pre>";
    	$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
        $n = "\n";

	    $indent = str_repeat( $t, $depth );

	    $output .= "$indent</ul>{$n}";

    }
}

class footer_menu_walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
    	
    	// Code for start_lvl goes here
    	
    	/*
    	$output .= "<pre>";
    	$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
    	$n = "\n";

    	$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

    	// Default class.
	    $classes 		=	array();
	    
	    /*
	    $classes[]		=	'sub-mega-menu';
	    $classes[]		=	'grid-x';
	    $classes[]		=	'grid-margin-x';
	    $classes[]		=	'small-up-2';
	    $classes[]		=	'medium-up-3';
	    $classes[]		=	'large-up-4';
	    */
	    
	    $class_names	=	join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
	    $class_names	=	$class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    	
    	// $output .= "{$n}{$indent}<ul class=\"grid-x grid-padding-x small-up-2 medium-up-3 large-up-4\">{$n}";
    	$output .= "{$n}{$indent}<ul {$class_names} data-submenu>{$n}";

	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    	
    	// Code for start_el goes here

    	$t = "\t";
    	$n = "\n";

    	$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    	$classes 		=	empty( $item->classes ) ? array() : (array) $item->classes;
	    $classes[]		=	'menu-item-' . $item->ID;

	    if ($item->menu_item_parent > 0): $classes[] = 'cell'; endif;
	    if ($args->walker->has_children > 0): $classes[] = 'has-submenu'; endif;

	    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
	    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

	    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
	    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

	    $output .= $indent . '<li' . $id . $class_names .'>';

	    $atts = array();
	    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
	    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
	    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
	    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
	    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

	    $attributes = '';
	    foreach ( $atts as $attr => $value ) {
	        if ( ! empty( $value ) ) {
	            $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
	            $attributes .= ' ' . $attr . '="' . $value . '"';
	        }
	    }

	    $title = apply_filters( 'the_title', $item->title, $item->ID );
	    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
 
	    $item_output = $args->before;
	    $item_output .= '<a'. $attributes .'>';
	    $item_output .= $args->link_before . $title . $args->link_after;
	    $item_output .= '</a>';	    
	    $item_output .= $args->after;

	    if ($item->description !== '' && $item->menu_item_parent > 0): $item_output .= '<p>'.esc_attr( $item->description ).'</p>'; endif;

	    if (has_post_thumbnail($item->object_id) && $item->menu_item_parent > 0):
	    	$image = wp_get_attachment_image_src( get_post_thumbnail_id($item->object_id), 'single-post-thumbnail' );
	    	$item_output .= '<div><img style="width: 100%;" src="'.$image[0].'"></div>';
		endif;

	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	    /*
	    echo "<pre>";
    	print_r($item);
    	echo "<br><br>";
    	echo "<pre>";
    	*/

    }
 
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        
        // Code for end_el goes here
        
        /*
        $output .= "<pre>";
		print_r($item);
		echo "<br><br>";
		$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
    	$n = "\n";

    	$output .= "</li>{$n}";

    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
    	
    	// Code for end_lvl goes here
    	
    	/*
    	$output .= "<pre>";
    	$output .= $depth;
    	// $output .= implode(", ", $args);
    	$output .= "</pre>";
    	*/

    	$t = "\t";
        $n = "\n";

	    $indent = str_repeat( $t, $depth );

	    $output .= "$indent</ul>{$n}";

    }
}

function kemosite_widgets_init() {

	register_sidebar( array(
		'name'          => 'Copyright Widget',
		'id'            => 'copyright_widget',
		'before_widget' => '<div class="copyright">',
		'after_widget'  => '</div>',
		'before_title'  => '<span style="display: none;">',
		'after_title'   => '</span>'
	) );

	register_sidebar( array(
		'name'          => 'Social Widget',
		'id'            => 'social_widget',
		'before_widget' => '<div class="social media">',
		'after_widget'  => '</div>',
		'before_title'  => '<span style="display: none;">',
		'after_title'   => '</span>'
	) );

}
add_action( 'widgets_init', 'kemosite_widgets_init' );

function register_my_menus() {

	// Unset menus from parent theme.
	unregister_nav_menu( 'top' );
	unregister_nav_menu( 'social' );
	
	register_nav_menu( 'top-bar-menu', __( 'Top Bar Menu', 'kemosite-blank-theme' ) );
	register_nav_menu( 'off-canvas-menu', __( 'Off Canvas Menu', 'kemosite-blank-theme' ) );
	register_nav_menu( 'footer-column-one', __( 'Footer Column One', 'kemosite-blank-theme' ) );
	register_nav_menu( 'footer-column-two', __( 'Footer Column Two', 'kemosite-blank-theme' ) );
	register_nav_menu( 'footer-menu', __( 'Footer Menu', 'kemosite-blank-theme' ) );
	register_nav_menu( 'off-canvas-footer-menu', __( 'Off Canvas Footer Menu', 'kemosite-blank-theme' ) );
	

}
add_action( 'after_setup_theme', 'register_my_menus' );

/* [ADD CUSTOMIZER CSS] */
add_action( 'wp_head', 'cd_customizer_css');
function cd_customizer_css() {
	
	
	/* [SET BLACK TINE] */
	$black_tint = get_theme_mod('kemosite_blank_colours_black', '#4d4d4d');
	$dark_black_tint = get_theme_mod('kemosite_blank_colours_dark_black', '#262626');
	$light_black_tint = get_theme_mod('kemosite_blank_colours_light_black', '#d9d9d9');

	/* [SET PRIMARY COLOURS] */
	$primary_color = get_theme_mod('kemosite_blank_colours_primary', '#4d4d4d');

	// Parse background colour for RGB value. Calculate luminousity. Determine black : white text.
	$hex = (substr($primary_color, 0, 1) === "#") ? substr($primary_color, 1) : $primary_color;
	
	$parse_r = intval(substr($hex, 0, 2), 16);
	$parse_g = intval(substr($hex, 2, 2), 16);
	$parse_b = intval(substr($hex, 4, 2), 16);

	$yiq = (($parse_r*299)+($parse_g*587)+($parse_b*114))/1000;

	$primary_font_auto_color = ($yiq >= 128) ? 'black' : 'white';

	$primary_bright_color = get_theme_mod('kemosite_blank_colours_bright_primary', '#4d4d4d');
	$primary_dark_color = get_theme_mod('kemosite_blank_colours_dark_primary', '#4d4d4d');

	$primary_invert_color = get_theme_mod('kemosite_blank_colours_invert_primary', '#4d4d4d');


	/* [HEADER BACKGROUND] */
	$header_background_color = get_theme_mod('kemosite_blank_header_bg_color', '#4d4d4d');
	
	// Parse background colour for RGB value. Calculate luminousity. Determine black : white text.
	$hex = (substr($header_background_color, 0, 1) === "#") ? substr($header_background_color, 1) : $header_background_color;
	
	$parse_r = intval(substr($hex, 0, 2), 16);
	$parse_g = intval(substr($hex, 2, 2), 16);
	$parse_b = intval(substr($hex, 4, 2), 16);

	$yiq = (($parse_r*299)+($parse_g*587)+($parse_b*114))/1000;

	$header_font_color = ($yiq >= 128) ? 'black' : 'white';

	/* [HEADER FONT] */
	$header_font = get_theme_mod('kemosite_blank_header_font');
	echo '<link href="https://fonts.googleapis.com/css?family='.$header_font.'" rel="stylesheet">';
	$header_font_family_name = explode(":", $header_font);
	// urldecode ( string $str )



	/* [H1-H6 FONT] */
	$h1_h6_font = get_theme_mod('kemosite_blank_fonts_h1_h6');
	echo '<link href="https://fonts.googleapis.com/css?family='.$h1_h6_font.'" rel="stylesheet">';
	$h1_h6_font_family_name = explode(":", $h1_h6_font);

	/* [BODY COPY FONT] */
	$body_copy_font = get_theme_mod('kemosite_blank_fonts_body');
	echo '<link href="https://fonts.googleapis.com/css?family='.$body_copy_font.'" rel="stylesheet">';
	$body_copy_font_family_name = explode(":", $body_copy_font);

	/* [BUTTON FONT] */
	$button_font = get_theme_mod('kemosite_blank_fonts_buttons');
	echo '<link href="https://fonts.googleapis.com/css?family='.$button_font.'" rel="stylesheet">';
	$button_font_family_name = explode(":", $button_font);



	/* [HEADER IMAGE] */
	$default_header_image = get_theme_mod('header_image');



	/* [COLUMNS] */
	$thumbnail_column_count = esc_attr( wc_get_loop_prop( 'columns' ) );
	$thumbnail_column_width = 100 / $thumbnail_column_count;
	$set_column_margin = 1; // %
	$set_column_width = $thumbnail_column_width - ($set_column_margin * 2);
<<<<<<< HEAD
	$set_double_column_width = ($thumbnail_column_width * 2) - ($set_column_margin * 2);
	$set_full_column_width = 100 - ($set_column_margin * 2);
=======
<<<<<<< HEAD
	$set_double_column_width = ($thumbnail_column_width * 2) - ($set_column_margin * 2);
	$set_full_column_width = 100 - ($set_column_margin * 2);
=======
>>>>>>> origin/develop-4.9.8
>>>>>>> fb6517e0e203ca0104993e72310c781951e4ca51

?>

	<style type="text/css">

	:root {

		--black_tint: <?php echo $black_tint; ?>;
		--light_black_tint: <?php echo $light_black_tint; ?>;
		--dark_black_tint: <?php echo $dark_black_tint; ?>;

		--primary_color: <?php echo $primary_color; ?>;
		--primary_font_auto_color: <?php echo $primary_font_auto_color; ?>;
		--primary_bright_color: <?php echo $primary_bright_color; ?>;
		--primary_dark_color: <?php echo $primary_dark_color; ?>;
		--primary_invert_color: <?php echo $primary_invert_color; ?>;

		--header_background_color: <?php echo $header_background_color; ?>;
		--header_font_color: <?php echo $header_font_color; ?>;
		--header_font_family_name: <?php echo "'" . urldecode($header_font_family_name[0]) . "', sans-serif"; ?>;

		--h1_h6_font_family_name: <?php echo "'" . urldecode($h1_h6_font_family_name[0]) . "', sans-serif"; ?>;
		--body_copy_font_family_name: <?php echo "'" . urldecode($body_copy_font_family_name[0]) . "', serif"; ?>;
		--button_font_family_name: <?php echo "'" . urldecode($button_font_family_name[0]) . "', sans-serif"; ?>;

		--default_header_image: <?php echo $default_header_image; ?>;

<<<<<<< HEAD
		--set_column_margin: <?php echo $set_column_margin; ?>%;
		--set_column_width: <?php echo $set_column_width; ?>%;
		--set_double_column_width: <?php echo $set_double_column_width; ?>%;
		--set_full_column_width: <?php echo $set_full_column_width; ?>%;
=======
		--set_column_margin: <?php echo $set_column_margin; ?>;
		--set_column_width: <?php echo $set_column_width; ?>;
<<<<<<< HEAD
		--set_double_column_width: <?php echo $set_double_column_width; ?>;
		--set_full_column_width: <?php echo $set_full_column_width; ?>;
=======
>>>>>>> origin/develop-4.9.8
>>>>>>> fb6517e0e203ca0104993e72310c781951e4ca51

	}

	div.section { 
		background-image: url(<?php echo $default_header_image; ?>);
		background-position: center; /* Center the image */
		background-repeat: no-repeat; /* Do not repeat the image */
		background-size: cover; /* Resize the background image to cover the entire container */
		/* filter: saturate(50%); */
	}
	

	</style>

	<script>
		var chart_colours = {
			primary: "<?php echo $primary_color; ?>"
		}
	</script>

<?php
}

add_action( 'customize_preview_init', 'cd_customizer' );
function cd_customizer() {
	wp_enqueue_script(
		  'cd_customizer',
		  get_stylesheet_directory_uri() . '/js/customizer.js',
		  array( 'jquery','customize-preview' ),
		  '',
		  true
	);
}

/*
function get_page_views($post_id) {

	if (function_exists('stats_get_csv')) {
	
		$args = array('days'=>-1, 'limit'=>-1, 'post_id'=>$post_id);
		$result = stats_get_csv('postviews', $args);
		$views = $result[0]['views'];

	} else {

		$views = 0;

	}
	return number_format_i18n($views);
}
*/

?>