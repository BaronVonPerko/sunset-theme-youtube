<?php


/**
 * Add the Admin page to the backend of the WordPress theme.
 */
function sunset_add_admin_page()
{
    add_menu_page(
        'Sunset Theme Options',
        'Sunset',
        'manage_options',
        'alecaddd-sunset',
        function () {
            require get_template_directory() . '/pages/admin.php';
        },
        'dashicons-admin-customizer',
        '110');
}
add_action('admin_menu', 'sunset_add_admin_page');