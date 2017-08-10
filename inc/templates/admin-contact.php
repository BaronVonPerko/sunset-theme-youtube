<h1>Sunset Contact Form</h1>

<?php settings_errors(); ?>

<form action="options.php" method="post" class="sunset-general-form">
    <?php
    settings_fields(SettingsGroups::SUNSET_CONTACT_OPTIONS);
    do_settings_sections(PageSlugs::SUNSET_CONTACT);
    submit_button();
    ?>
</form>