( function( $ ) {

	/* [UPDATE COLOURS] */
	wp.customize( 'kemosite_blank_colours_black', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css( '--black_tint', newval );
		} );
	} );

	wp.customize( 'kemosite_blank_colours_dark_black', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css( '--dark_black_tint', newval );
		} );
	} );

	wp.customize( 'kemosite_blank_colours_light_black', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css( '--light_black_tint', newval );
		} );
	} );

	wp.customize( 'kemosite_blank_colours_primary', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css( '--primary_color', newval );
		} );
	} );

	wp.customize( 'kemosite_blank_colours_bright_primary', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css( '--primary_bright_color', newval );
		} );
	} );

	wp.customize( 'kemosite_blank_colours_dark_primary', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css( '--primary_dark_color', newval );
		} );
	} );

	wp.customize( 'kemosite_blank_colours_invert_primary', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css( '--primary_invert_color', newval );
		} );
	} );

	wp.customize( 'kemosite_blank_header_bg_color', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css( '--header_background_color', newval );
		} );
	} );
	

	/* [UPDATE FONTS] */
	wp.customize( 'kemosite_blank_header_font', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css( '--header_font_family_name', newval );
		} );
	} );

	wp.customize( 'kemosite_blank_fonts_h1_h6', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css( '--h1_h6_font_family_name', newval );
		} );
	} );

	wp.customize( 'kemosite_blank_fonts_body', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css( '--body_copy_font_family_name', newval );
		} );
	} );

	wp.customize( 'kemosite_blank_fonts_buttons', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css( '--button_font_family_name', newval );
		} );
	} );

} )( jQuery );