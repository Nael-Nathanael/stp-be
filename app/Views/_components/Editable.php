<?php
$field_label = str_replace("(", "", $field_label);
$field_label = str_replace(")", "", $field_label);
$field_multiple = $field_multiple ?? false;

$lang = currLang();

$iconSize = 25;
?>

<div class="stpfield">
    <?php if (isDev()): ?>
        <code><?= $field_id ?></code>
    <?php endif ?>
    <?php if ($field_multiple): ?>
        <textarea
                id="<?= $field_id ?>"
                name="<?= $field_id ?>"
                style="line-height: 1.2"
                rows="4"
                class="form-control form-control-sm form-control-plaintext py-0"
                onblur="triggerSave(this)"
                placeholder="[<?= currLang() ?>] <?= $field_label ?>"
        ><?= call($field_id, '') ?></textarea>
    <?php else: ?>
        <input
                id="<?= $field_id ?>"
                name="<?= $field_id ?>"
                class="form-control form-control-sm form-control-plaintext py-0"
                onblur="triggerSave(this)"
                placeholder="[<?= currLang() ?>] <?= $field_label ?>"
                value="<?= call($field_id, '') ?>"
        >
    <?php endif; ?>

    <label for="<?= $field_id ?>" style="width: <?= $iconSize ?>px; height: <?= $iconSize ?>px; font-size: 12px"
           class="bg-primary text-white border border-2 rounded-circle d-flex justify-content-center align-items-center border-white position-absolute end-100 top-50 translate-middle-y me-1">
        <i class="bi bi-pen"></i>
    </label>

    <div style="width: <?= $iconSize ?>px; height: <?= $iconSize ?>px; font-size: 12px"
         onclick="triggerSave(document.getElementById('<?= $field_id ?>'))"
         class="saveButton bg-success text-white border border-2 rounded-circle d-flex justify-content-center align-items-center border-white position-absolute end-100 top-50 translate-middle-y me-1">
        <i class="bi bi-check-lg"></i>
    </div>

    <span class="text-success d-none bg-white px-2 py-1 badge rounded-pill mx-auto position-absolute end-0 top-0"
          style="font-size: 12px;"
          id="<?= $field_id ?>__saved_indicator">saved</span>
</div>