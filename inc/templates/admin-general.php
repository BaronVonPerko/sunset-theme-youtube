<?php

require_once get_template_directory() . '/inc/enums.php';

/**
 * Page variables
 */

$fullName = esc_attr(get_option(OptionNames::FIRST_NAME)) . ' ' . esc_attr(get_option(OptionNames::LAST_NAME));
$description = esc_attr(get_option(OptionNames::USER_DESCRIPTION));
?>

<h1>Sunset Theme Options</h1>

<?php settings_errors(); ?>

<div class="sunset-sidebar-preview">
    <div class="sunset-sidebar">
        <h1 class="sunset-username">
            <?php print $fullName; ?>
        </h1>

        <h2 class="sunset-description">
            <?php print $description; ?>
        </h2>

        <div class="icons-wrapper">

        </div>
    </div>
</div>

<form action="options.php" method="post" class="sunset-general-form">
    <?php
    settings_fields(SettingsGroups::SUNSET_SETTINGS);
    do_settings_sections(PageSlugs::SUNSET);
    submit_button();
    ?>
</form>