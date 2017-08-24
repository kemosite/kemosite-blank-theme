<?php

function buttons_shortcode_method($attributes, $content) {

	$output = "";

	if ($attributes !== NULL):

		if ($attributes['href'] !== NULL):
			$output .= '<a href="'.$attributes['href'].'" ';
		else: $output .= '';
			$output .= '<button type="button" ';
		endif;
		
		$output .= 'class="';

		if ($attributes['type'] == "success"): 
			$output .= 'success ';
		elseif ($attributes['type'] == "alert"):
			$output .= 'alert ';
		elseif ($attributes['type'] == "secondary"):
			$output .= 'secondary ';
		endif;

		if ($attributes['size'] == "tiny"): 
			$output .= 'tiny ';
		elseif ($attributes['size'] == "small"):
			$output .= 'small ';
		elseif ($attributes['size'] == "large"):
			$output .= 'large ';
		elseif ($attributes['size'] == "expanded"):
			$output .= 'expanded ';
		endif;

		$output .= 'button">' . "\n";

		$output .= do_shortcode($content) . "\n";
		
		if ($attributes['href'] !== NULL):
			$output .= '</a>' . "\n";
		else: 
			$output .= '</button>' . "\n";
		endif;

	endif;

	return $output;

}
add_shortcode( 'button', 'buttons_shortcode_method' );

function button_group_shortcode_method($attributes, $content) {

	$output = "";

	$output .= '<div class="button-group>'."\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</div>'."\n";

	return $output;

}
add_shortcode( 'button_group', 'button_group_shortcode_method' );

?>