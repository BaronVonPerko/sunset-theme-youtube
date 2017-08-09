<?php

require_once get_template_directory() . '/inc/enums.php';


$options = get_option(OptionNames::POST_FORMATS);


$formats = array(
    'aside',
    'gallery',
    'link',
    'image',
    'quote',
    'status',
    'video',
    'audio',
    'chat'
);

$output = array();

foreach ($formats as $format) {
    $output[] = @$options[$format] == 1 ? $format : '';
}


if (!empty($options)) {
    add_theme_support('post-formats', $output);
}