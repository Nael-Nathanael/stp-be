<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-end flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("CAREER_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>

    <div class="container py-4" style="z-index: 101">
        <div class="w-50 d-flex flex-column gap-2">
            <div class="small fw-semibold">
                <?= summon_editable("(Career Page Tag)", "CAREER_HERO_TAG") ?>
            </div>

            <div class="bg-warning pt-1" style="max-width: 100px"></div>

            <div class="py-0 fw-semibold" style="font-size: 1.5rem">
                <?= summon_editable_ckeditor("(Career Page Title)", "CAREER_HERO_TITLE") ?>
            </div>

            <div class="lead py-0 fw-normal">
                <?= summon_editable_ckeditor("(Career Page Subtitle)", "CAREER_HERO_SUBTITLE") ?>
            </div>
        </div>
    </div>

    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("CAREER_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container p-2 border border-danger border-2" style="background-color: #f8d7da">
        <div class="h3 fw-semibold">
            <?= summon_editable("Beware Fraud Title", "CAREER_CORE_TITLE") ?>
        </div>

        <div class="fw-semibold">
            <?= summon_editable("Beware Fraud Content", "CAREER_CORE_SUBTITLE") ?>
        </div>
    </section>

    <section class="my-4 container">
        <div class="row align-items-center">
            <div class="col-5">
                <?= summon_image_field("CAREER_HEADER_BG") ?>
            </div>
            <div class="col-6 offset-1">
                <div class="small fw-semibold">
                    <?= summon_editable("Career Header Tag", "CAREER_HEADER_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable_ckeditor("Career Header Title", "CAREER_HEADER_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable_ckeditor("Career Header Content", "CAREER_HEADER_CONTENT") ?>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4 container">
        <div class="small fw-semibold">
            <?= summon_editable("Career Tag", "CAREER_CORE_TAG") ?>
        </div>

        <div class="bg-warning pt-1" style="max-width: 100px"></div>

        <div class="h3 fw-semibold">
            <?= summon_editable_ckeditor("Career Title", "CAREER_CORE_TITLE") ?>
        </div>

        <div class="fw-semibold">
            <?= summon_editable_ckeditor("Career Subtitle", "CAREER_CORE_SUBTITLE") ?>
        </div>

        <div class="my-3 bg-secondary py-5 d-flex justify-content-center align-items-center">
            Coming Soon: Career Editor
        </div>
    </section>

    <section class="py-5 bg-dark d-flex justify-content-center align-items-center text-white">
        Footer
    </section>
</div>


<?= $this->endSection(); ?>

