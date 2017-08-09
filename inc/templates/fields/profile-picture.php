<?php $picture = esc_attr(get_option(OptionNames::PROFILE_PICTURE)); ?>

<?php if (empty($picture)): ?>

    <input id="btn-upload"
           class="button button-primary"
           type="button"
           value="Upload Profile Picture">

    <input id="hdn-profile-picture"
           name="<?php echo OptionNames::PROFILE_PICTURE ?>"
           type="hidden"
           value="">

<?php else: ?>

    <input id="btn-upload"
           class="button button-primary"
           type="button"
           value="Replace Profile Picture">

    <input id="btn-remove"
           type="button"
           class="button button-secondary"
           value="Remove">

    <input id="hdn-profile-picture"
           name="<?php echo OptionNames::PROFILE_PICTURE ?>"
           type="hidden"
           value="<?php echo $picture ?>">

<?php endif; ?>