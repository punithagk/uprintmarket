<?php if (isset($fields['field_url']->content) and $fields['field_url']->content != '') { print '<a href="'.url($fields['field_url']->content).'">';}?>
<?php if (isset($fields['field_image']->content)) if (theme_get_setting('tm_slide_show') == 1) print $fields['field_image']->content; else print $fields['field_image_1']->content; ?>
<?php if (isset($fields['field_url']->content) and $fields['field_url']->content != '') { print '</a>';}?>