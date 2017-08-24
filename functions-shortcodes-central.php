<?php


/* Three columns wrap shortcode */
function central_three_columns($attributes, $content) {

    $output = "";
    $output .= '<div class="grid-x large-up-4">' . do_shortcode($content) . '</div>' . "\n";
    return $output;

}
add_shortcode('three_columns', 'central_three_columns');

/* Four columns wrap shortcode */
function central_four_columns($attributes, $content) {

    $output = "";
    $output .= '<div class="grid-x large-up-3">' . do_shortcode($content) . '</div>' . "\n";
    return $output;

}
add_shortcode('four_columns', 'central_four_columns');

/* Two columns wrap shortcode */
function central_two_columns($attributes, $content) {

    $output = "";
	$output .= '<div class="grid-x large-up-6">' . do_shortcode($content) . '</div>' . "\n";
	return $output;

}
add_shortcode('two_columns', 'central_two_columns');
add_shortcode('two_columns_66_33', 'central_two_columns');
add_shortcode('two_columns_33_66', 'central_two_columns');
add_shortcode('two_columns_75_25', 'central_two_columns');
add_shortcode('two_columns_25_75', 'central_two_columns');

/* Column shortcode */
function central_column($attributes, $content) {

	$output = "";
	$output .= '<div class="cell">' . do_shortcode($content) . '</div>' . "\n";
	return $output;

}
add_shortcode('column1', 'central_column');
add_shortcode('column2', 'central_column');
add_shortcode('column3', 'central_column');
add_shortcode('column4', 'central_column');


/* Message shortcode */
function central_message($attributes, $content) {

	$output = ""; 
	$output .= '<div class="callout">' . do_shortcode($content) . '</div>' . "\n";
	return $output;

}
add_shortcode('message', 'central_message');

/* Testimonial shortcode */
function central_testimonial($attributes, $content) {

	$output = "";

	$output .= '<div class="media-object stack-for-small">' . "\n";

	if ($attributes !== NULL):

		if ($attributes['img'] !== NULL):

			$output .= '<div class="media-object-section">' . "\n";
			$output .= '<div class="thumbnail">' . "\n";
			$output .= '<img src="'.$attributes['img'].'">' . "\n";
			$output .= '</div>' . "\n";
			$output .= '</div>' . "\n";

		endif;

	endif;

	$output .= '<div class="media-object-section">' . "\n";
	$output .= do_shortcode($content) . "\n";
	$output .= '</div>' . "\n";

	$output .= '</div>' . "\n";

	return $output;

}
add_shortcode('testimonial', 'central_testimonial');