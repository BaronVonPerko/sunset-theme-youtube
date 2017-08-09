<?php

/**
 * Class SettingsGroups
 */
abstract class SettingsGroups
{
    const SUNSET_SETTINGS = "sunset-settings-group";
    const SUNSET_THEME_SUPPORT = "sunset-theme-support";
}


/**
 * Class SettingsSection
 */
abstract class SettingsSection
{
    const SUNSET_SIDEBAR_OPTIONS = "sunset-sidebar-options";
    const SUNSET_THEME_OPTIONS = "sunset-theme-options";
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
    CONST POST_FORMATS = "post_formats";
}


/**
 * Class PageSlugs
 */
abstract class PageSlugs
{
    const SUNSET_SIDEBAR = "alecaddd_sunset_sidebar";
    const SUNSET_CSS = "alecaddd_sunset_css";
    const SUNSET_OPTIONS = "alecaddd_sunset_options";
}


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