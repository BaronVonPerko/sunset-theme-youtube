<?php $options = get_option(OptionNames::ACTIVATE_CONTACT_FORM); ?>

<label>
    <input
        id="<?php echo OptionNames::ACTIVATE_CONTACT_FORM; ?>"
        name="<?php echo OptionNames::ACTIVATE_CONTACT_FORM; ?>"
        type="checkbox"
        <?php echo (@$options == 1) ? ' checked ' : ''; ?>
        value="1">
</label>