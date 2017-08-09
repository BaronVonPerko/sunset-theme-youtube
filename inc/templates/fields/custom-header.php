<?php $options = get_option(OptionNames::CUSTOM_HEADER); ?>

<label>
    <input
        id="<?php echo OptionNames::CUSTOM_HEADER; ?>"
        name="<?php echo OptionNames::CUSTOM_HEADER; ?>"
        type="checkbox"
        <?php echo (@$options == 1) ? ' checked ' : ''; ?>
        value="1">
    Activate the Custom Header
</label>
