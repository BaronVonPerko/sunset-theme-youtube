<?php

/**
 * Class SettingsGroups
 */
abstract class SettingsGroups
{
    const SUNSET_SETTINGS = "sunset-settings-group";
    const SUNSET_THEME_SUPPORT = "sunset-theme-support";
    const SUNSET_CONTACT_OPTIONS = "sunset-contact-options";
}


/**
 * Class SettingsSection
 */
abstract class SettingsSection
{
    const SUNSET_SIDEBAR_OPTIONS = "sunset-sidebar-options";
    const SUNSET_THEME_OPTIONS = "sunset-theme-options";
    const SUNSET_CONTACT_OPTIONS = "sunset-contact-options";
}


/**
 * Class OptionNames
 */
abstract class OptionNames
{
    const PROFILE_PICTURE = "profile_picture";
    const FIRST_NAME = "first_name";
    const LAST_NAME = "last_name";
    const USER_DESCRIPTION = "user_description";
    const TWITTER_HANDLE = "twitter_handle";
    const FACEBOOK_HANDLE = "facebook_handle";
    const GPLUS_HANDLE = "gplus_handle";
    const POST_FORMATS = "post_formats";
    const CUSTOM_HEADER = "custom_header";
    const CUSTOM_BACKGROUND = "custom_background";
    const ACTIVATE_CONTACT_FORM = "activate_contact_form";
}


/**
 * Class PageSlugs
 */
abstract class PageSlugs
{
    const SUNSET_SIDEBAR = "alecaddd_sunset_sidebar";
    const SUNSET_CSS = "alecaddd_sunset_css";
    const SUNSET_OPTIONS = "alecaddd_sunset_options";
    const SUNSET_CONTACT = "alecaddd_sunset_theme_contact";
}


/**
 * Class CustomPostTypes
 */
abstract class CustomPostTypes
{
    const SUNSET_CONTACT = "sunset-contact";
}


/**
 * Class MetaBoxes
 */
abstract class MetaBoxes
{
    const SUNSET_CONTACT_EMAIL = "sunset_contact_email";
    const SUNSET_CONTACT_EMAIL_META_BOX_NONCE = "sunset_contact_email_meta_box_nonce";
    const SUNSET_CONTACT_EMAIL_FIELD = "sunset_contact_email_field";
    const SUNSET_CONTACT_EMAIL_VALUE_KEY = "_contact_email_value_key";
}


/**
 * Class Misc
 */
abstract class Misc
{
    const POST_FORMATS = [
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat'
    ];
}