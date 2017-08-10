<?php

/**
 * On admin_menu, setup admin pages and settings.
 */
add_action('admin_menu', function () {

    sunset_setup_admin_pages();

    sunset_setup_admin_general_settings();

    sunset_setup_options_settings();

    sunset_setup_contact_form_options();
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
        PageSlugs::SUNSET_SIDEBAR,
        function () {
            require_once get_template_directory() . '/inc/templates/admin-sidebar.php';
        },
        'dashicons-admin-customizer',
        110);

    // Generate Sunset Sidebar Sub Page
    add_submenu_page(
        PageSlugs::SUNSET_SIDEBAR,
        'Sunset Sidebar Options',
        'Sidebar',
        'manage_options',
        PageSlugs::SUNSET_SIDEBAR,
        function () {
            require_once get_template_directory() . '/inc/templates/admin-sidebar.php';
        }
    );

    // Generate Theme Options Sub Page
    add_submenu_page(
        PageSlugs::SUNSET_SIDEBAR,
        'Sunset Theme Options',
        'Theme Options',
        'manage_options',
        PageSlugs::SUNSET_OPTIONS,
        function () {
            require_once get_template_directory() . '/inc/templates/admin-options.php';
        }
    );

    // Generate Contact Form Options Sub Page
    add_submenu_page(
        PageSlugs::SUNSET_SIDEBAR,
        'Sunset Contact Form',
        'Contact Form',
        'manage_options',
        PageSlugs::SUNSET_CONTACT,
        function () {
            require_once get_template_directory() . '/inc/templates/admin-contact.php';
        }
    );

    // Generate CSS Options Sub Page
    add_submenu_page(
        PageSlugs::SUNSET_SIDEBAR,
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
            PageSlugs::SUNSET_SIDEBAR
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
 * Setup admin options page settings.
 */
function sunset_setup_options_settings()
{
    add_action('admin_init', function () {
        register_setting(SettingsGroups::SUNSET_THEME_SUPPORT, OptionNames::POST_FORMATS);
        register_setting(SettingsGroups::SUNSET_THEME_SUPPORT, OptionNames::CUSTOM_HEADER);
        register_setting(SettingsGroups::SUNSET_THEME_SUPPORT, OptionNames::CUSTOM_BACKGROUND);
    });

    // Theme Support Section
    add_settings_section(
        SettingsSection::SUNSET_THEME_OPTIONS,
        'Theme Options',
        function () {
            echo 'Activate and Deactivate specific Theme Support Options';
        },
        PageSlugs::SUNSET_OPTIONS
    );

    sunset_create_support_option('post-formats', 'Post Formats');
    sunset_create_support_option('custom-header', 'Custom Header');
    sunset_create_support_option('custom-background', 'Custom Background');
}


/**
 * Setup the settings and options for the contact form.
 */
function sunset_setup_contact_form_options()
{
    add_action('admin_init', function () {
        register_setting(SettingsGroups::SUNSET_CONTACT_OPTIONS, OptionNames::ACTIVATE_CONTACT_FORM);
    });

    add_settings_section(
        SettingsSection::SUNSET_CONTACT_OPTIONS,
        'Contact Form Options',
        function () {
            echo 'Activate and Deactivate Contact Form Options';
        },
        PageSlugs::SUNSET_CONTACT
    );

    sunset_create_contact_form_option('activate-contact-form', 'Activate Contact Form');
}


/**
 * Add settings field to the sidebar options
 *
 * @param $id
 * @param $title
 */
function sunset_create_sidebar_option($id, $title)
{
    create_option($id, $title, PageSlugs::SUNSET_SIDEBAR, SettingsSection::SUNSET_SIDEBAR_OPTIONS);
}


/**
 * Add settings field to the theme support options
 *
 * @param $id
 * @param $title
 */
function sunset_create_support_option($id, $title)
{
    create_option($id, $title, PageSlugs::SUNSET_OPTIONS, SettingsSection::SUNSET_THEME_OPTIONS);
}


/**
 * Add settings field to the contact form options
 *
 * @param $id
 * @param $title
 */
function sunset_create_contact_form_option($id, $title)
{
    create_option($id, $title, PageSlugs::SUNSET_CONTACT, SettingsSection::SUNSET_CONTACT_OPTIONS);
}


/**
 * Create the option.
 *
 * @param $id
 * @param $title
 * @param $slug
 * @param $section
 */
function create_option($id, $title, $slug, $section)
{
    add_settings_field(
        'sunset-' . $id,
        $title,
        function () use ($id) {
            require_once get_template_directory() . '/inc/templates/fields/' . $id . '.php';
        },
        $slug,
        $section
    );
}