<h1>Sunset Theme Support Options</h1>

<?php settings_errors(); ?>

<form action="options.php" method="post" class="sunset-general-form">
    <?php
    settings_fields(SettingsGroups::SUNSET_THEME_SUPPORT);
    do_settings_sections(PageSlugs::SUNSET_OPTIONS);
    submit_button();
    ?>
</form>