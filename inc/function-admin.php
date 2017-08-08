<?php


/**
 * On admin_menu, setup admin pages and settings.
 */
add_action('admin_menu', function () {

    sunset_setup_admin_pages();

    sunset_setup_admin_general_settings();

});


/**
 * Setup admin menu page and sub pages.
 */
function sunset_setup_admin_pages()
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
}


/**
 * Setup admin general page settings.
 */
function sunset_setup_admin_general_settings()
{
    add_action('admin_init', function () {
        register_setting('sunset-settings-group', 'first_name');
        register_setting('sunset-settings-group', 'last_name');
        register_setting('sunset-settings-group', 'user_description');
        register_setting('sunset-settings-group', 'twitter_handle', function ($input) {
            $output = sanitize_text_field($input);
            $output = str_replace('@', '', $output);
            return $output;
        });
        register_setting('sunset-settings-group', 'facebook_handle');
        register_setting('sunset-settings-group', 'gplus_handle', function ($input) {
            $output = sanitize_text_field($input);
            $output = str_replace('+', '', $output);
            return $output;
        });

        // Sidebar Section
        add_settings_section(
            'sunset-sidebar-options',
            'Sidebar Options',
            function () {
                echo '<p>Customize Your Sidebar Information</p>';
            },
            'alecaddd_sunset'
        );

        // Sidebar Field - Name
        add_settings_field(
            'sidebar-name',
            'Full Name',
            function () {
                require_once get_template_directory() . '/inc/templates/fields/name.php';
            },
            'alecaddd_sunset',
            'sunset-sidebar-options'
        );

        // Sidebar Field - Description
        add_settings_field(
            'sidebar-description',
            'Description',
            function () {
                require_once get_template_directory() . '/inc/templates/fields/description.php';
            },
            'alecaddd_sunset',
            'sunset-sidebar-options'
        );

        // Sidebar Field - Twitter
        add_settings_field(
            'sidebar-twitter',
            'Twitter Handle',
            function () {
                require_once get_template_directory() . '/inc/templates/fields/twitter.php';
            },
            'alecaddd_sunset',
            'sunset-sidebar-options'
        );

        // Sidebar Field - Facebook
        add_settings_field(
            'sidebar-facebook',
            'Facebook Handle',
            function () {
                require_once get_template_directory() . '/inc/templates/fields/facebook.php';
            },
            'alecaddd_sunset',
            'sunset-sidebar-options'
        );

        // Sidebar Field - Google Plus
        add_settings_field(
            'sidebar-gplus',
            'Google+ Handle',
            function () {
                require_once get_template_directory() . '/inc/templates/fields/google.php';
            },
            'alecaddd_sunset',
            'sunset-sidebar-options'
        );
    });
}