<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>
<?php
/**
 * @var String $segment
 */

$label = ucfirst(strtolower($segment)) . " Aspect"
?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("SUSTAINABILITY_${segment}_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>


    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("SUSTAINABILITY_${segment}_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="small fw-semibold">
            <?= summon_editable("$label Header Tag", "SUSTAINABILITY_${segment}_HEADER_TAG") ?>
        </div>

        <div class="bg-warning pt-1" style="max-width: 100px"></div>

        <div class="h3 fw-semibold">
            <?= summon_editable_ckeditor("$label Header Title", "SUSTAINABILITY_${segment}_HEADER_TITLE") ?>
        </div>

        <div class="fw-semibold">
            <?= summon_editable_ckeditor("$label Header Content", "SUSTAINABILITY_${segment}_HEADER_CONTENT") ?>
        </div>
    </section>

    <section class="my-4 w-100 position-relative py-5"
             style="background: url('<?= $GLOBALS['stp_media']->getOrPlaceholderByKey("${segment}_BANNER_BG") ?>') center no-repeat; background-size: cover"
    >
        <div class="position-absolute top-0 end-0 p-2">
            <?= summon_image_button("${segment}_BANNER_BG") ?>
        </div>

        <!-- Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100"
             style="opacity: .30; z-index: 100; background-color: black"></div>

        <div class="position-relative container text-white" style=" z-index: 101;">
            <?= summon_editable_ckeditor("$label Banner Content", "${segment}_BANNER_CONTENT", 300) ?>
        </div>
    </section>

    <section class="my-4 container">
        <div class="row g-5">
            <?php for ($i = 1; $i <= 6; $i++): ?>
                <div class="col-4">
                    <?= summon_image_field("${segment}_CARD_${i}_IMG") ?>

                    <div class="h6 m-0">
                        <?= summon_editable("$label Card Title $i", "${segment}_CARD_${i}_TITLE") ?>
                    </div>

                    <div class="p m-0">
                        <?= summon_editable_ckeditor("$label Card Content $i", "${segment}_CARD_${i}_CONTENT") ?>
                    </div>
                </div>
            <?php endfor ?>
        </div>
    </section>

    <section class="bg-light container my-4">
        <div class="p-5 d-flex justify-content-center align-items-center">
            Coming Soon: <?= $label ?> Documents Editor
        </div>
    </section>
</div>


<?= $this->endSection(); ?>

