<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("BNM_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>


    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("BNM_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="row align-items-center">
            <div class="h3 fw-semibold">
                <?= summon_editable_ckeditor("About Header Title", "BNM_HEADER_TITLE") ?>
            </div>

            <div class="fw-semibold">
                <?= summon_editable_ckeditor("About Header Content", "BNM_HEADER_CONTENT") ?>
            </div>
        </div>
    </section>

    <section class="my-4 container">
        <div class="row">
            <div class="col-7">
                <div class="small">
                    <?= summon_editable("Director 1 Tag", "BNM_DIR_1_TAG") ?>
                </div>

                <div class="h3 fw-semibold">
                    <?= summon_editable_ckeditor("Director 1 Name", "BNM_DIR_1_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable_ckeditor("Director 1 Content", "BNM_DIR_1_CONTENT") ?>
                </div>
            </div>
            <div class="col-5">
                <?= summon_image_field("BNM_DIR_1_IMG", [1, 1], [1000, 1000]) ?>
            </div>
        </div>
    </section>

    <section class="my-4 container">
        <div class="my-3 bg-secondary py-5 d-flex justify-content-center align-items-center" style="min-height: 300px">
            Coming Soon: Board Member 1 Editor
        </div>
    </section>

    <section class="my-4 container">
        <div class="row">
            <div class="col-5">
                <?= summon_image_field("BNM_DIR_2_IMG", [1, 1], [1000, 1000]) ?>
            </div>
            <div class="col-7">
                <div class="small">
                    <?= summon_editable("Manager Tag", "BNM_DIR_2_TAG") ?>
                </div>

                <div class="h3 fw-semibold">
                    <?= summon_editable_ckeditor("Manager Name", "BNM_DIR_2_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable_ckeditor("Manager Content", "BNM_DIR_2_CONTENT") ?>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4 container">
        <div class="my-3 bg-secondary py-5 d-flex justify-content-center align-items-center" style="min-height: 300px">
            Coming Soon: Management Editor
        </div>
    </section>

    <section class="py-5 bg-dark d-flex justify-content-center align-items-center text-white">
        Footer
    </section>
</div>


<?= $this->endSection(); ?>

