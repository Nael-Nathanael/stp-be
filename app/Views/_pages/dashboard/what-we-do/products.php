<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("WWD_PD_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>


    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("WWD_PD_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="small fw-semibold">
            <?= summon_editable("Our Product Header Tag", "WWD_PD_HEADER_TAG") ?>
        </div>

        <div class="bg-warning pt-1" style="max-width: 100px"></div>

        <div class="h3 fw-semibold">
            <?= summon_editable_ckeditor("Our Product Header Title", "WWD_PD_HEADER_TITLE") ?>
        </div>

        <div class="fw-semibold">
            <?= summon_editable_ckeditor("Our Product Header Content", "WWD_PD_HEADER_CONTENT") ?>
        </div>
    </section>

    <section class="bg-light container my-4">
        <div class="p-5 d-flex justify-content-center align-items-center">
            Coming Soon: Our Product Editor
        </div>
    </section>
</div>


<?= $this->endSection(); ?>

