<?php

/**
 * Setup custom post types.
 */


/**
 * Activate custom contact form, and modify how
 * it is displayed on the admin page.
 */
if (@get_option(OptionNames::ACTIVATE_CONTACT_FORM) == 1) {

    sunset_contact_custom_post_type();

    sunset_contact_columns();

    sunset_contact_custom_columns();
    
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


/**
 * Set columns to be displayed in admin page.
 */
function sunset_contact_columns()
{
    add_filter(
        'manage_' . CustomPostTypes::SUNSET_CONTACT . '_posts_columns',
        function () {
            return array(
                'title'   => 'Full Name',
                'message' => 'Message',
                'email'   => 'Email',
                'date'    => 'Date'
            );
        }
    );
}

/**
 * Set how certain columns will be displayed.
 */
function sunset_contact_custom_columns()
{
    add_action(
        'manage_' . CustomPostTypes::SUNSET_CONTACT . '_posts_custom_column',
        function ($column, $postId) {
            switch ($column) {
                case 'message':
                    echo get_the_excerpt();
                    break;

                case 'email':
                    echo 'email address';
                    break;
            }
        },
        10, // priority
        2   // number of arguments
    );
}