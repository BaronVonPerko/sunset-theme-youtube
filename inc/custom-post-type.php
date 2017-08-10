<?php

/**
 * Setup custom post types.
 */


/**
 * Activate custom contact form.
 */
if (@get_option(OptionNames::ACTIVATE_CONTACT_FORM) == 1) {
    sunset_contact_custom_post_type();
}

/**
 * Contact Custom Post Type
 */
function sunset_contact_custom_post_type()
{
    $labels = array(
        'name'           => 'Messages',
        'singular_name'  => 'Message',
        'menu_name'      => 'Messages',
        'name_admin_bar' => 'Message',
    );

    $args = array(
        'labels'          => $labels,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierarchical'    => false,
        'menu_position'   => 26,
        'menu_icon'       => 'dashicons-email-alt',
        'supports'        => array('title', 'editor', 'author'),
    );

    register_post_type(CustomPostTypes::SUNSET_CONTACT, $args);
}