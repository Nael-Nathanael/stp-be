<?php
$field_label = str_replace("(", "", $field_label);
$field_label = str_replace(")", "", $field_label);
$show_label = $show_label ?? false;

$lang = currLang();

$iconSize = 25;
?>

<div class="stpfield <?= $show_label ? "withlabel" : "" ?>">
    <?php if (isDev()): ?>
        <code style="font-size: 12px"><?= $field_id ?></code>
    <?php endif ?>
    <?php if ($show_label): ?>
        <div><?= $field_label ?></div>
    <?php endif ?>
    <input
            id="<?= $field_id ?>"
            name="<?= $field_id ?>"
            class="form-control form-control-sm <?= $show_label ? "" : "form-control-plaintext" ?> py-0"
            onblur="triggerSave(this)"
            placeholder="[<?= currLang() ?>] <?= $field_label ?>"
            value="<?= call($field_id, '') ?>"
    >

    <?php if (!$show_label): ?>
        <label for="<?= $field_id ?>" style="width: <?= $iconSize ?>px; height: <?= $iconSize ?>px; font-size: 12px"
               class="bg-primary text-white border border-2 rounded-circle d-flex justify-content-center align-items-center border-white position-absolute end-100 top-50 translate-middle-y me-1">
            <i class="bi bi-pen"></i>
        </label>

        <div style="width: <?= $iconSize ?>px; height: <?= $iconSize ?>px; font-size: 12px"
             onclick="triggerSave(document.getElementById('<?= $field_id ?>'))"
             class="saveButton bg-success text-white border border-2 rounded-circle d-flex justify-content-center align-items-center border-white position-absolute end-100 top-50 translate-middle-y me-1">
            <i class="bi bi-check-lg"></i>
        </div>
    <?php endif; ?>

    <span class="text-success d-none bg-white px-2 py-1 badge rounded-pill mx-auto position-absolute end-0 top-0"
          style="font-size: 12px;"
          id="<?= $field_id ?>__saved_indicator">saved</span>
</div>