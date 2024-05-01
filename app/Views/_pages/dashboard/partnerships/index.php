<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("PARTNERSHIPS_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>


    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("PARTNERSHIPS_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="small fw-semibold">
                    <?= summon_editable("Partnerships Header Tag", "PARTNERSHIPS_HEADER_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable("Partnerships Header Title", "PARTNERSHIPS_HEADER_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable("Partnerships Header Content", "PARTNERSHIPS_HEADER_CONTENT") ?>
                </div>
            </div>
        </div>
    </section>


    <section class="my-4 container">
        <div class="small fw-semibold">
            <?= summon_editable("Financial Statement Header Tag", "PARTNERSHIPS_FINS_TAG") ?>
        </div>

        <div class="bg-warning pt-1" style="max-width: 100px"></div>

        <div class="h3 fw-semibold">
            <?= summon_editable("Financial Statement Title", "PARTNERSHIPS_FINS_TITLE") ?>
        </div>

        <div class="fw-semibold">
            <?= summon_editable("Financial Statement Subtitle", "PARTNERSHIPS_FINS_SUBTITLE") ?>
        </div>

        <div class="my-3 bg-secondary py-5 d-flex justify-content-center align-items-center">
            Coming Soon: Financial Statement Editor
        </div>
    </section>

    <section class="my-4 position-relative"
             style="background: url('<?= callMedia("PARTNERSHIPS_REPORTS_BG") ?>') center;
                     background-size: cover;"
    >
        <div class="position-absolute top-0 end-0 m-2">
            <?= summon_image_button("PARTNERSHIPS_REPORTS_BG") ?>
        </div>

        <div class="container">
            <div class="fw-semibold small">
                <?= summon_editable("Reports Tag", "PARTNERSHIPS_REPORTS_TAG") ?>
            </div>
            <div class="fw-semibold h3">
                <?= summon_editable("The Annual Reports", "PARTNERSHIPS_REPORTS_TITLE") ?>
            </div>
            <div class="my-3 bg-secondary py-5 d-flex justify-content-center align-items-center">
                Coming Soon: Annual Reports Editor
            </div>
        </div>
    </section>

    <section class="my-4 container">
        <div class="row">
            <div class="col-4">
                <div class="small fw-semibold">
                    <?= summon_editable("Presentations Header Tag", "PARTNERSHIPS_PRESENTATIONS_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable("Presentations Title", "PARTNERSHIPS_PRESENTATIONS_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable("Presentations Subtitle", "PARTNERSHIPS_PRESENTATIONS_SUBTITLE") ?>
                </div>
            </div>
            <div class="col-8">
                <div class="my-3 bg-secondary py-5 d-flex justify-content-center align-items-center">
                    Coming Soon: Presentations Editor
                </div>
            </div>
        </div>
    </section>


    <section class="mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-5">
                    <?= summon_image_field("PARTNERSHIPS_SHAREHOLDERS_BG_LEFT") ?>
                </div>
                <div class="col-6 offset-1">
                    <small>
                        <?= summon_editable("ShareHolder Tag", "PARTNERSHIPS_SHAREHOLDERS_TAG") ?>
                    </small>

                    <div class="h3">
                        <?= summon_editable("ShareHolder Title", "PARTNERSHIPS_SHAREHOLDERS_TITLE") ?>
                    </div>

                    <div class="p">
                        <?= summon_editable("ShareHolder Subtitle", "PARTNERSHIPS_SHAREHOLDERS_SUBTITLE") ?>
                    </div>

                    <div>
                        <?= summon_editable("Read More", "PARTNERSHIPS_SHAREHOLDERS_BUTTON") ?>
                        <small class="d-block ms-3">
                            <?= summon_editable("Read More URL", "PARTNERSHIPS_SHAREHOLDERS_BUTTON_URL") ?>
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

