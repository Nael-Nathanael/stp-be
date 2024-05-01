<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("SUSTAINABILITY_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>


    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("SUSTAINABILITY_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="small fw-semibold">
                    <?= summon_editable("Sustainability Header Tag", "SUSTAINABILITY_HEADER_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable("Sustainability Header Title", "SUSTAINABILITY_HEADER_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable("Sustainability Header Content", "SUSTAINABILITY_HEADER_CONTENT") ?>
                </div>
            </div>
        </div>
    </section>


    <section class="my-4 container">
        <div class="small fw-semibold">
            <?= summon_editable("Sustainability Report Header Tag", "SUSTAINABILITY_FINS_TAG") ?>
        </div>

        <div class="bg-warning pt-1" style="max-width: 100px"></div>

        <div class="h3 fw-semibold">
            <?= summon_editable("Sustainability Report Title", "SUSTAINABILITY_FINS_TITLE") ?>
        </div>

        <div class="fw-semibold">
            <?= summon_editable("Sustainability Report Subtitle", "SUSTAINABILITY_FINS_SUBTITLE") ?>
        </div>

        <div class="my-3 bg-secondary py-5 d-flex justify-content-center align-items-center">
            Coming Soon: Sustainability Report Editor
        </div>
    </section>

    <section class="mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-5">
                    <?= summon_image_field("SUSTAINABILITY_ASPECT_1_BG") ?>
                </div>
                <div class="col-6 offset-1">
                    <small>
                        <?= summon_editable("Aspect 1 Tag", "SUSTAINABILITY_ASPECT_1_TAG") ?>
                    </small>

                    <div class="h3">
                        <?= summon_editable("Aspect 1 Title", "SUSTAINABILITY_ASPECT_1_TITLE") ?>
                    </div>

                    <div class="p">
                        <?= summon_editable("Aspect 1 Subtitle", "SUSTAINABILITY_ASPECT_1_SUBTITLE") ?>
                    </div>

                    <div>
                        <?= summon_editable("Read More", "SUSTAINABILITY_ASPECT_1_BUTTON") ?>
                        <small class="d-block ms-3">
                            <?= summon_editable("Read More URL", "SUSTAINABILITY_ASPECT_1_BUTTON_URL") ?>
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
                        <?= summon_editable("Aspect 2 Tag", "SUSTAINABILITY_ASPECT_2_TAG") ?>
                    </small>

                    <div class="h3">
                        <?= summon_editable("Aspect 2 Title", "SUSTAINABILITY_ASPECT_2_TITLE") ?>
                    </div>

                    <div class="p">
                        <?= summon_editable("Aspect 2 Subtitle", "SUSTAINABILITY_ASPECT_2_SUBTITLE") ?>
                    </div>

                    <div>
                        <?= summon_editable("Read More", "SUSTAINABILITY_ASPECT_2_BUTTON") ?>
                        <small class="d-block ms-3">
                            <?= summon_editable("Read More URL", "SUSTAINABILITY_ASPECT_2_BUTTON_URL") ?>
                        </small>
                    </div>
                </div>
                <div class="col-6">
                    <?= summon_image_field("SUSTAINABILITY_ASPECT_2_BG") ?>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-5">
                    <?= summon_image_field("SUSTAINABILITY_ASPECT_3_BG") ?>
                </div>
                <div class="col-6 offset-1">
                    <small>
                        <?= summon_editable("Aspect 3 Tag", "SUSTAINABILITY_ASPECT_3_TAG") ?>
                    </small>

                    <div class="h3">
                        <?= summon_editable("Aspect 3 Title", "SUSTAINABILITY_ASPECT_3_TITLE") ?>
                    </div>

                    <div class="p">
                        <?= summon_editable("Aspect 3 Subtitle", "SUSTAINABILITY_ASPECT_3_SUBTITLE") ?>
                    </div>

                    <div>
                        <?= summon_editable("Read More", "SUSTAINABILITY_ASPECT_3_BUTTON") ?>
                        <small class="d-block ms-3">
                            <?= summon_editable("Read More URL", "SUSTAINABILITY_ASPECT_3_BUTTON_URL") ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-dark d-flex justify-content-center align-items-center text-white">
        Footer
    </section>
</div>


<?= $this->endSection(); ?>

