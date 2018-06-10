<?php

define("KEMOSITE_BLANK_PARENT_STYLE", "twentyseventeen"); // This is 'twentyseventeen' for the Twenty Seventeen theme.

/* [Declare Depedencies] */
function kemosite_blank_theme_dependencies() {
  
	// Check for kemosite-typography-plugin
	if (!is_plugin_active('kemosite-typography-plugin/index.php')):
		echo '<div class="error"><p>Warning: This theme needs the kemosite-typography-plugin to function.</p></div>';
	endif;
	//plugin is activated

	// Check for github-updater
	if (!is_plugin_active('github-updater-develop/github-updater.php')):
		echo '<div class="error"><p>Warning: This theme needs the github-updater plugin to function.</p></div>';
	endif;

}
add_action( 'admin_notices', 'kemosite_blank_theme_dependencies' );

/* [Includes] */
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
	    $classes[]		=	'sub-mega-menu';
	    $classes[]		=	'grid-x';
	    $classes[]		=	'grid-margin-x';
	    $classes[]		=	'small-up-2';
	    $classes[]		=	'medium-up-3';
	    $classes[]		=	'large-up-4';
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

	    if ($item->menu_item_parent > 0): $classes[] = 'cell'; endif;

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

function register_my_menus() {

	// Unset menus from parent theme.
	unregister_nav_menu( 'top' );
	unregister_nav_menu( 'social' );
	
	register_nav_menu( 'top-bar-menu', __( 'Top Bar Menu', 'kemosite-blank-theme' ) );
	register_nav_menu( 'off-canvas-menu', __( 'Off Canvas Menu', 'kemosite-blank-theme' ) );

}
add_action( 'after_setup_theme', 'register_my_menus' );

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