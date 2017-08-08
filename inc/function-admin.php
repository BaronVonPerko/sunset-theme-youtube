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
            return str_replace('@', '', sanitize_text_field($input));
        });
        register_setting('sunset-settings-group', 'facebook_handle');
        register_setting('sunset-settings-group', 'gplus_handle', function ($input) {
            return str_replace('+', '', sanitize_text_field($input));
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

        sunset_create_sidebar_option('name', 'Full Name');
        sunset_create_sidebar_option('description', 'Description');
        sunset_create_sidebar_option('twitter', 'Twitter Handle');
        sunset_create_sidebar_option('facebook', 'Facebook Handle');
        sunset_create_sidebar_option('gplus', 'Google+ Handle');
    });
}

/**
 * Add settings field to the sidebar options
 *
 * @param $id
 * @param $title
 */
function sunset_create_sidebar_option($id, $title)
{
    add_settings_field(
        'sunset-' . $id,
        $title,
        function () use ($id) {
            require_once get_template_directory() . '/inc/templates/fields/' . $id . '.php';
        },
        'alecaddd_sunset',
        'sunset-sidebar-options'
    );
}