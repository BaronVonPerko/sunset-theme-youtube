<?php
/**
 * Email Meta Box
 *
 * $value must be given
 */
?>


<label for="<?php echo MetaBoxes::SUNSET_CONTACT_EMAIL_FIELD; ?>">User Email Address: </label>

<input id="<?php echo MetaBoxes::SUNSET_CONTACT_EMAIL_FIELD; ?>"
       name="<?php echo MetaBoxes::SUNSET_CONTACT_EMAIL_FIELD; ?>"
       type="email"
       value="<?php echo esc_attr($value); ?>"
       size="25">