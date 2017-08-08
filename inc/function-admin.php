<?php


/**
 * Add the Admin page and sub pages to the backend of the WordPress theme.
 */
function sunset_add_admin_page()
{
    // Generate Sunset Admin Page
    add_menu_page(
        'Sunset Theme Options',
        'Sunset',
        'manage_options',
        'alecaddd_sunset',
        function () {
            require_once get_template_directory() . '/inc/templates/admin.php';
        },
        'dashicons-admin-customizer',
        110);

    // Generate General Sub Page
    add_submenu_page(
        'alecaddd_sunset',
        'Sunset Theme Options',
        'General',
        'manage_options',
        'alecaddd_sunset',
        function () {
            require_once get_template_directory() . '/inc/templates/admin.php';
        }
    );

    // Generate CSS Options Sub Page
    add_submenu_page(
        'alecaddd_sunset',
        'Sunset CSS Options',
        'Custom CSS',
        'manage_options',
        'alecaddd_sunset_css',
        function () {
            require_once get_template_directory() . '/inc/templates/admin-css.php';
        }
    );
}

add_action('admin_menu', 'sunset_add_admin_page');