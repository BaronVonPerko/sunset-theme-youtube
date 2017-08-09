<?php

$options = get_option(OptionNames::POST_FORMATS);

foreach (Misc::POST_FORMATS as $format): ?>
    <label>
        <input type="checkbox"
               id="<?php echo $format; ?>"
               name="<?php echo OptionNames::POST_FORMATS . '[' . $format . ']'; ?>"
               <?php echo ( @$options[$format] == 1 ) ? ' checked ' : ' '; ?>
               value="1">
        <?php echo $format; ?>
    </label>
    <br>
<?php endforeach;