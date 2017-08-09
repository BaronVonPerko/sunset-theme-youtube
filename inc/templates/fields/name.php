<input name="<?php echo OptionNames::FIRST_NAME; ?>"
       value="<?php echo esc_attr(get_option(OptionNames::FIRST_NAME)) ?>"
       placeholder="First Name" />

<input name="<?php echo OptionNames::LAST_NAME; ?>"
       value="<?php echo esc_attr(get_option(OptionNames::LAST_NAME)) ?>"
       placeholder="Last Name" />