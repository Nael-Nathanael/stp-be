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
    <section class="my-5 container">
        <div class="position-relative">
            <div class="card card-body shadow-sm px-2 py-1 mb-2 position-absolute top-0 start-50 translate-middle"
                 style="z-index: 1001; width: fit-content">
                <h1 class="card-title fs-5">
                    Section Editor: Gallery Announcement
                </h1>
            </div>
            <hr class="bg-primary">
        </div>

        <div class="py-3">
            <div class="small fw-semibold">
                <?= summon_editable("Gallery Announcement Tag", "GALLERY_ANN_TAG") ?>
            </div>

            <div class="bg-warning pt-1 mb-2" style="max-width: 100px"></div>

            <div class="h5 fw-bold mb-3">
                <?= summon_editable("Announcement Title", "GALLERY_ANN_TITLE") ?>
            </div>

            <?php for ($i = 1; $i <= 3; $i++): ?>
                <div class="card card-body mb-2 shadow">
                    <div class="text-success">
                        <?= summon_editable("Announcement $i Date", "GALLERY_ANN_${i}_DATE") ?>
                    </div>
                    <div>
                        <?= summon_editable_ckeditor("Announcement $i Content", "GALLERY_ANN_${i}_CONTENT") ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>

        <div class="position-relative">
            <div class="card card-body shadow-sm px-2 py-1 mb-2 position-absolute top-0 start-50 translate-middle"
                 style="z-index: 1001; width: fit-content">
                <h1 class="card-title fs-5">
                    Section Editor: Gallery Announcement
                </h1>
            </div>
            <hr class="bg-primary">
        </div>
    </section>

    <section class="my-4 container">
        <div class="my-3 bg-secondary py-5 d-flex justify-content-center align-items-center" style="min-height: 300px">
            Coming Soon: Gallery Album Editor
        </div>
    </section>
</div>


<?= $this->endSection(); ?>

