<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 d-flex justify-content-center flex-column text-white position-relative"
     style="min-height: 400px;
             background: url('<?= callMedia("NEWS_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>

    <div class="container py-4" style="z-index: 101">
        <div class="small fw-semibold">
            <?= summon_editable("(News Page Tag)", "NEWS_HERO_TAG") ?>
        </div>

        <div class="bg-warning pt-1" style="max-width: 100px"></div>

        <div class="py-0 fw-semibold" style="font-size: 1.5rem">
            <?= summon_editable_ckeditor("(News Page Title)", "NEWS_HERO_TITLE") ?>
        </div>
    </div>

    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("NEWS_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="bg-light container my-4">
        <div class="p-5 d-flex justify-content-center align-items-center">
            Coming Soon: News Editor
        </div>
    </section>
</div>


<?= $this->endSection(); ?>

