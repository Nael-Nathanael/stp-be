<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="height: max(80vh, 400px);
             background: url('<?= callMedia("HOME_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>

    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("HOME_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="small fw-semibold">
                    <?= summon_editable("Home Header Tag", "HOME_HEADER_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable("Home Header Title", "HOME_HEADER_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable("Home Header Content", "HOME_HEADER_CONTENT") ?>
                </div>
            </div>
            <div class="col-6">
                <?= summon_image_field("HOME_HEADER_RIGHT_IMG") ?>
            </div>
        </div>
    </section>

    <section class="container my-4">
        <div class="row">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <div class="col-4">
                    <?= summon_image_field("HOME_ABOUT_WE_$i") ?>

                    <div class="h4">
                        <?= summon_editable("__ We __", "HOME_ABOUT_WE_${i}_title") ?>
                    </div>

                    <?= summon_editable("We __", "HOME_ABOUT_WE_${i}_content") ?>

                    <small>
                        <?= summon_editable("Learn More Button", "HOME_ABOUT_WE_${i}_button") ?>
                        <small class="d-block ms-4">
                            <?= summon_editable("Button's URL", "HOME_ABOUT_WE_${i}_button_url") ?>
                        </small>
                    </small>
                </div>
            <?php endfor ?>
        </div>
    </section>

    <section class="container my-4">
        <div class="p-5 position-relative"
             style="background: url('<?= callMedia("HOME_SUST_BG") ?>') center;
                     background-size: cover;"
        >
            <div class="position-absolute top-0 end-0 m-2">
                <?= summon_image_button("HOME_SUST_BG") ?>
            </div>

            <div class="row align-items-center">
                <div class="col-9">
                    <div class="fw-semibold small">
                        <?= summon_editable("Sustainability", "HOME_SUST_TAG") ?>
                    </div>

                    <div class="h3 fw-normal">
                        <?= summon_editable("Our commitment to sustainability", "HOME_SUST_TITLE") ?>
                    </div>

                    <div class="fw-normal">
                        <?= summon_editable("Sustainability Content", "HOME_SUST_CONTENT") ?>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <?= summon_editable("Learn More", "HOME_SUST_BUTTON") ?>
                        <small class="d-block ms-3">
                            <?= summon_editable("Learn More URL", "HOME_SUST_BUTTON_URL") ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4 container">
        <div class="row">
            <div class="col-8">
                <div class="fw-semibold small">
                    <?= summon_editable("Stock Price Live Tag", "HOME_SPL_TAG") ?>
                </div>
                <div class="fw-semibold h3">
                    <?= summon_editable("Stock Price Live Title", "HOME_SPL_TITLE") ?>
                </div>
            </div>

            <div class="col-4">
                <div class="fw-semibold small text-end">
                    <?= summon_editable("Line 1", "HOME_SPL_INFO_LINE_1") ?>
                </div>
                <div class="fw-semibold small text-end">
                    <?= summon_editable("Line 2", "HOME_SPL_INFO_LINE_2") ?>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex py-5 bg-secondary justify-content-center align-items-center">
                    Coming Soon: Stock Price Live Editor
                </div>
            </div>
        </div>
    </section>

    <section class="my-4 container">
        <div class="fw-semibold small">
            <?= summon_editable("News Tag", "HOME_NEWS_TAG") ?>
        </div>
        <div class="fw-semibold h3">
            <?= summon_editable("Latest News", "HOME_NEWS_TITLE") ?>
        </div>

        <div class="my-3 bg-secondary py-5 d-flex justify-content-center align-items-center">
            Coming Soon: News Editor
        </div>
    </section>

    <section class="my-4 position-relative"
             style="background: url('<?= callMedia("HOME_REPORTS_BG") ?>') center;
                     background-size: cover;"
    >
        <div class="position-absolute top-0 end-0 m-2">
            <?= summon_image_button("HOME_REPORTS_BG") ?>
        </div>

        <div class="container">
            <div class="fw-semibold small">
                <?= summon_editable("Reports Tag", "HOME_REPORTS_TAG") ?>
            </div>
            <div class="fw-semibold h3">
                <?= summon_editable("The Annual Reports", "HOME_REPORTS_TITLE") ?>
            </div>
            <div class="my-3 bg-secondary py-5 d-flex justify-content-center align-items-center">
                Coming Soon: Annual Reports Editor
            </div>
        </div>
    </section>

    <section class="my-4 container">
        <div class="fw-semibold small">
            <?= summon_editable("Contact Us Tag", "HOME_CONTACT_US_TAG") ?>
        </div>
        <div class="fw-semibold h3">
            <?= summon_editable("Contact Us Title", "HOME_CONTACT_US_TITLE") ?>
        </div>
        <div>
            <?= summon_editable("Contact Us Button", "HOME_CONTACT_US_BUTTON") ?>
            <small class="d-block ms-3">
                <?= summon_editable("Contact Us Button URL", "HOME_CONTACT_US_BUTTON_URL") ?>
            </small>
        </div>
        <div class="w-50 ms-auto">
            <?= summon_image_field("HOME_CONTACT_US_IMAGE") ?>
        </div>
    </section>

    <section class="mt-5 py-5 bg-dark d-flex justify-content-center align-items-center text-white">
        Footer
    </section>
</div>


<?= $this->endSection(); ?>

