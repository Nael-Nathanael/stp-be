<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-end flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("GALLERY_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>

    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("GALLERY_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="my-3 bg-secondary py-5 d-flex justify-content-center align-items-center" style="min-height: 300px">
            Coming Soon: Gallery Announcement Editor
        </div>
    </section>

    <section class="my-4 container">
        <div class="my-3 bg-secondary py-5 d-flex justify-content-center align-items-center" style="min-height: 300px">
            Coming Soon: Gallery Album Editor
        </div>
    </section>
</div>


<?= $this->endSection(); ?>

