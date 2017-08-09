<?php

require_once get_template_directory() . '/inc/enums.php';


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
        PageSlugs::SUNSET,
        function () {
            require_once get_template_directory() . '/inc/templates/admin-general.php';
        },
        'dashicons-admin-customizer',
        110);

    // Generate General Sub Page
    add_submenu_page(
        PageSlugs::SUNSET,
        'Sunset Theme Options',
        'General',
        'manage_options',
        PageSlugs::SUNSET,
        function () {
            require_once get_template_directory() . '/inc/templates/admin-general.php';
        }
    );

    // Generate CSS Options Sub Page
    add_submenu_page(
        PageSlugs::SUNSET,
        'Sunset CSS Options',
        'Custom CSS',
        'manage_options',
        PageSlugs::SUNSET_CSS,
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
        register_setting(SettingsGroups::SUNSET_SETTINGS, OptionNames::PROFILE_PICTURE);
        register_setting(SettingsGroups::SUNSET_SETTINGS, OptionNames::FIRST_NAME);
        register_setting(SettingsGroups::SUNSET_SETTINGS, OptionNames::LAST_NAME);
        register_setting(SettingsGroups::SUNSET_SETTINGS, OptionNames::USER_DESCRIPTION);
        register_setting(SettingsGroups::SUNSET_SETTINGS, OptionNames::TWITTER_HANDLE, function ($input) {
            return str_replace('@', '', sanitize_text_field($input));
        });
        register_setting(SettingsGroups::SUNSET_SETTINGS, OptionNames::FACEBOOK_HANDLE);
        register_setting(SettingsGroups::SUNSET_SETTINGS, OptionNames::GPLUS_HANDLE, function ($input) {
            return str_replace('+', '', sanitize_text_field($input));
        });

        // Sidebar Section
        add_settings_section(
            SettingsSection::SUNSET_SIDEBAR_OPTIONS,
            'Sidebar Options',
            function () {
                echo '<p>Customize Your Sidebar Information</p>';
            },
            PageSlugs::SUNSET
        );

        sunset_create_sidebar_option('profile-picture', 'Profile Picture');
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
        PageSlugs::SUNSET,
        SettingsSection::SUNSET_SIDEBAR_OPTIONS
    );
}