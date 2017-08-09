<?php

/**
 * Sets up the post formats based on the formats
 * selected in the Sunset Theme Options page.
 */

$options = get_option(OptionNames::POST_FORMATS);
$output = array();

foreach (Misc::POST_FORMATS as $format) {
    $output[] = @$options[$format] == 1 ? $format : '';
}

if (!empty($output)) {
    add_theme_support('post-formats', $output);
}