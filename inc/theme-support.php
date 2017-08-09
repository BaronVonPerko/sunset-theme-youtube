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


/**
 * Activate custom header.
 */
if (@get_option(OptionNames::CUSTOM_HEADER) == 1) {
    add_theme_support('custom-header');
}

/**
 * Activate custom background.
 */
if (@get_option(OptionNames::CUSTOM_BACKGROUND) == 1) {
    add_theme_support('custom-background');
}