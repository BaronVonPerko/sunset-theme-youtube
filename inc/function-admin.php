<?php


/**
 * Add the Admin page and sub pages to the backend of the Sunset WordPress theme.
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
            require_once get_template_directory() . '/inc/templates/admin-general.php';
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
            require_once get_template_directory() . '/inc/templates/admin-general.php';
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

    // Activate Custom Settings
    add_action('admin_init', function () {
        register_setting('sunset-settings-group', 'first_name');

        // Sidebar Section
        add_settings_section(
            'sunset-sidebar-options',
            'Sidebar Options',
            function () {
                echo 'Customize Your Sidebar Information';
            },
            'alecaddd_sunset'
        );

        // Sidebar Field - First Name
        add_settings_field(
            'sidebar-name',
            'First Name',
            function () {
                $firstName = esc_attr(get_option('first_name'));
                echo '<input name="first_name" value="'.$firstName.'" placeholder="First Name" />';
            },
            'alecaddd_sunset',
            'sunset-sidebar-options'
        );
    });
}

add_action('admin_menu', 'sunset_add_admin_page');