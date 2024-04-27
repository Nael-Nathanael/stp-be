<?php
/**
 * @var String $field_id
 * @var String $field_label
 * @var STPStrings $strings
 */

use App\Models\STPStrings;

$strings = $GLOBALS['stp_strings']
?>

<div class="form-floating mb-3 w-100">
    <input type="text" name="<?= $field_id ?>"
           value="<?= $strings->getOrCreateByKey($field_id)->{currLang()} ?>"
           id="<?= $field_id ?>" class="form-control w-100 autosaving_field">
    <label for="<?= $field_id ?>"><?= $field_label ?></label>
</div>