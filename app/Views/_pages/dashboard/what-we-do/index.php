<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("WWD_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>


    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("WWD_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="small fw-semibold">
                    <?= summon_editable("What We Do Header Tag", "WWD_HEADER_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable("What We Do Header Title", "WWD_HEADER_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable("What We Do Header Content", "WWD_HEADER_CONTENT") ?>
                </div>
            </div>
            <div class="col-6">
                <?= summon_image_field("WWD_HEADER_RIGHT_IMG") ?>
            </div>
        </div>
    </section>

    <section class="my-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <?= summon_image_field("WWD_PRODUCT_BG_LEFT") ?>
                </div>
                <div class="col-6">
                    <?= summon_image_field("WWD_PRODUCT_BG_TOP") ?>

                    <small>
                        <?= summon_editable("Product Tag", "WWD_PRODUCT_TAG") ?>
                    </small>

                    <div class="h3">
                        <?= summon_editable("Product Title", "WWD_PRODUCT_TITLE") ?>
                    </div>

                    <div class="p">
                        <?= summon_editable("Product Subtitle", "WWD_PRODUCT_SUBTITLE") ?>
                    </div>

                    <div>
                        <?= summon_editable("Read More", "WWD_PRODUCT_BUTTON") ?>
                        <small class="d-block ms-3">
                            <?= summon_editable("Read More URL", "WWD_PRODUCT_BUTTON_URL") ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <small>
                        <?= summon_editable("Location Tag", "WWD_LOCATION_TAG") ?>
                    </small>

                    <div class="h3">
                        <?= summon_editable("Location Title", "WWD_LOCATION_TITLE") ?>
                    </div>

                    <div class="p">
                        <?= summon_editable("Location Subtitle", "WWD_LOCATION_SUBTITLE") ?>
                    </div>

                    <div>
                        <?= summon_editable("Read More", "WWD_LOCATION_BUTTON") ?>
                        <small class="d-block ms-3">
                            <?= summon_editable("Read More URL", "WWD_LOCATION_BUTTON_URL") ?>
                        </small>
                    </div>
                </div>
                <div class="col-6">
                    <?= summon_image_field("WWD_PRODUCT_BG_LEFT") ?>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-dark d-flex justify-content-center align-items-center text-white">
        Footer
    </section>
</div>


<?= $this->endSection(); ?>

