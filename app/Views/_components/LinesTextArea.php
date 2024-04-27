<?php
/**
 * @var String $field_id
 * @var String $field_label
 */
?>

<?php $strings = model("STPStrings"); ?>

<div class="form-floating mb-3">
    <textarea style="min-height: 200px" type="text" name="<?= $field_id ?>"
              id="<?= $field_id ?>"
              class="form-control autosaving_field"><?= $strings->findOrEmptyString($field_id) ?></textarea>
    <label for="<?= $field_id ?>"><?= $field_label ?></label>
</div>