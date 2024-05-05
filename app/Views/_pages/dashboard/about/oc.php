<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="min-height: 300px;
             background: url('<?= callMedia("OC_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>


    <div class="container py-4" style="z-index: 101">
        <div class="w-50 d-flex flex-column gap-2">
            <div class="small fw-semibold">
                <?= summon_editable("(Our Code Page Tag)", "OC_HERO_TAG") ?>
            </div>

            <div class="bg-warning pt-1" style="max-width: 100px"></div>

            <div class="py-0 fw-semibold" style="font-size: 1.5rem">
                <?= summon_editable_ckeditor("(Our Code Page Title)", "OC_HERO_TITLE") ?>
            </div>

            <div class="lead py-0 fw-normal">
                <?= summon_editable_ckeditor("(Our Code Page Subtitle)", "OC_HERO_SUBTITLE") ?>
            </div>
        </div>
    </div>

    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("OC_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="row">
            <div class="col-6">
                <?= summon_image_field("OC_HEADER_LEFT_IMG") ?>
                <div class="w-50">
                    <?= summon_image_field("OC_HEADER_LEFT_IMG_OPT") ?>
                </div>
            </div>
            <div class="col-6">
                <div class="small fw-semibold">
                    <?= summon_editable("Our Code Header Tag", "OC_HEADER_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable_ckeditor("Our Code Header Title", "OC_HEADER_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable_ckeditor("Our Code Header Content", "OC_HEADER_CONTENT") ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light container my-4">
        <div class="p-5 d-flex justify-content-center align-items-center">
            Coming Soon: Our Code Document Editor
        </div>
    </section>

    <section class="container my-4">
        <?= summon_editable_ckeditor("Our Code Extra Content", "OC_EXTRAS") ?>
    </section>
</div>


<?= $this->endSection(); ?>

