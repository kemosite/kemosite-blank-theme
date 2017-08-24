<?php

/* [Customizations] */
function my_customize_register( $wp_customize ) {

	$font_selection = array(
		'Oswald' => 'Oswald'
	);

	$font_stretch = array(
		'normal' => 'Normal',
		'condensed' => 'Condensed',
		'ultra-condensed' => "Ultra Condensed",
		'extra-condensed' => 'Extra Condensed',
		'semi-condensed' => 'Semi Condensed',
		'expanded' => 'Expanded',
		'semi-expanded' => 'Semi Expanded,',
		'extra-expanded' => 'Extra Exapanded',
		'ultra-expanded' => 'Ultra Expanded'
	);

	$font_styles = array(
		'normal' => 'Normal',
		'italic' => 'Italic',
		'oblique' => 'Oblique'
	);

	$font_weights = array(
		'normal' => 'Normal',
		'bold' => 'Bold',
		'100' => '100,',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900'
	);

  /*
  $wp_customize->add_panel();
  $wp_customize->get_panel();
  $wp_customize->remove_panel();
  */

 	/* [SECTIONS] *
 	**	Title				ID								Priority (Order)
	**	Site 				Title & Tagline	title_tagline	20
	**	Colors				colors							40
	**	Header Image		header_image					60
	**	Background Image	background_image				80
	**	Menus (Panel)		nav_menus						100
	**	Widgets (Panel)		widgets							110
	**	Static Front Page	static_front_page				120
	**						default							160
	**	Additional CSS		custom_css						200
	*/
 
	/*
	$wp_customize->add_section( 'custom_css', array(
		'title' => __( 'Custom Poops' ),
		'description' => __( 'Add custom CSS here' ),
		'panel' => '', // Not typically needed.
		'priority' => 160,
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
	) );

	*/

	// Add a footer/copyright information section.
	$wp_customize->add_section( 'fonts' , array(
	  'title' => __( 'Font Options', 'kemosite-blank-theme' ),
	  'description' => 'Font options for the theme.',
	  'priority' => 50, // Before Widgets.
	  'capability' => 'edit_theme_options'
	) );

	/*
	$wp_customize->get_section();
	$wp_customize->remove_section();
	*/

	$wp_customize->add_setting( 'h1_font', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_setting( 'h1_colour', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );
  
	/*
	$wp_customize->get_setting();
	$wp_customize->remove_setting();
	*/

	/*
	The most important parameter when adding a control is its type — this determines what type of UI the Customizer will display. Core provides several built-in control types:

	<input> elements with any allowed type (see below)
	checkbox
	textarea
	radio (pass a keyed array of values => labels to the choices argument)
	select (pass a keyed array of values => labels to the choices argument)
	dropdown-pages (use the allow_addition argument to allow users to add new pages from the control)
	For any input type supported by the html input element, simply pass the type attribute value to the type parameter when adding the control. This allows support for control types such as text, hidden, number, range, url, tel, email, search, time, date, datetime, and week, pending browser support.
	*/

	$wp_customize->add_control( 'h1_font', array(
		'type' => 'select',
		'priority' => 10, // Within the section.
		'section' => 'fonts', // Required, core or custom.
		'label' => __( 'H1 Font' ),
		'description' => __( 'Font to use for H1 tags.' ),
		'choices' => $font_selection,
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h1_colour', array(
		'priority' => 10, // Within the section.
		'label' => __( 'H1 Colour', 'kemosite-blank-theme' ),
		'section' => 'fonts',
	) ) );

	/*
	$wp_customize->get_control();
	$wp_customize->remove_control();
*/

}

add_action('customize_register','my_customize_register');

?>