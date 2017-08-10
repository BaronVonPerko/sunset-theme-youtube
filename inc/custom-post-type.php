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

    sunset_contact_add_email_meta_box();

    add_action('save_post', 'sunset_save_contact_email_data');
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
                    $email = get_post_meta($postId, MetaBoxes::SUNSET_CONTACT_EMAIL_VALUE_KEY, true);
                    echo '<a href="mailto:' . $email . '">' . $email . '</a>';
                    break;
            }
        },
        10, // priority
        2   // number of arguments
    );
}


/**
 * Setup the meta box for capturing email addresses.
 */
function sunset_contact_add_email_meta_box()
{
    add_action('add_meta_boxes', function () {
        add_meta_box(
            MetaBoxes::SUNSET_CONTACT_EMAIL,
            'User Email',
            function ($post) {
                wp_nonce_field(
                    'sunset_save_contact_email_data',
                    MetaBoxes::SUNSET_CONTACT_EMAIL_META_BOX_NONCE
                );

                $value = get_post_meta($post->ID, MetaBoxes::SUNSET_CONTACT_EMAIL_VALUE_KEY, true);

                require_once(get_template_directory() . '/inc/templates/metaboxes/email.php');
            },
            CustomPostTypes::SUNSET_CONTACT,
            'side'
        );
    });
}


/**
 * Save the email meta box data.
 *
 * @param $postId
 */
function sunset_save_contact_email_data($postId)
{
    if (!isset($_POST[MetaBoxes::SUNSET_CONTACT_EMAIL_META_BOX_NONCE])) {
        return;
    }

    // prevent hackers!
    if (!wp_verify_nonce($_POST[MetaBoxes::SUNSET_CONTACT_EMAIL_META_BOX_NONCE], 'sunset_save_contact_email_data')) {
        return;
    }

    // prevent saving if WP is auto saving the form
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // check user permissions
    if (!current_user_can('edit_post', $postId)) {
        return;
    }

    // return if our email field is empty
    if (!isset($_POST[MetaBoxes::SUNSET_CONTACT_EMAIL_FIELD])) {
        return;
    }

    $email = sanitize_text_field($_POST[MetaBoxes::SUNSET_CONTACT_EMAIL_FIELD]);

    update_post_meta($postId, MetaBoxes::SUNSET_CONTACT_EMAIL_VALUE_KEY, $email);
}