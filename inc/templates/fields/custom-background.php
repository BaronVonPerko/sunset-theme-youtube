<?php $options = get_option(OptionNames::CUSTOM_BACKGROUND); ?>

<label>
    <input
        id="<?php echo OptionNames::CUSTOM_BACKGROUND; ?>"
        name="<?php echo OptionNames::CUSTOM_BACKGROUND; ?>"
        type="checkbox"
        <?php echo (@$options == 1) ? ' checked ' : ''; ?>
        value="1">
    Activate the Custom Background
</label>
