<?php $picture = esc_attr(get_option(OptionNames::PROFILE_PICTURE)); ?>


<input id="btn-upload"
       class="button button-secondary"
       type="button"
       value="Upload Profile Picture">


<input id="hdn-profile-picture"
       name="<?php echo OptionNames::PROFILE_PICTURE ?>"
       type="hidden"
       value="<?php echo $picture ?>">