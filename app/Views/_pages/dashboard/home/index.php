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

    <div class="container" style="z-index: 101">
        <div class="w-50 d-flex flex-column gap-2">
            <div class="small fw-semibold">
                <?= summon_editable("(Page Tag)", "HOME_HERO_TAG") ?>
            </div>

            <div class="bg-warning pt-1" style="max-width: 100px"></div>

            <div class="py-0 fw-semibold" style="font-size: 1.5rem">
                <?= summon_editable_ckeditor("(Page Title)", "HOME_HERO_TITLE") ?>
            </div>

            <div class="lead py-0 fw-normal">
                <?= summon_editable_ckeditor("(Page Subtitle)", "HOME_HERO_SUBTITLE") ?>
            </div>

            <div class="py-0 fw-normal">
                <?= summon_editable("(Button)", "HOME_HERO_BUTTON") ?>
                <small class="ps-4 d-block fw-lighter">
                    <?= summon_editable("(Button URL)", "HOME_HERO_BUTTON_URL") ?>
                </small>
            </div>
        </div>
    </div>

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
                    <?= summon_editable_ckeditor("Home Header Title", "HOME_HEADER_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable_ckeditor("Home Header Content", "HOME_HEADER_CONTENT") ?>
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

                    <?= summon_editable_ckeditor("We __", "HOME_ABOUT_WE_${i}_content") ?>

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

    <section class="container my-4 text-white">
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
                        <?= summon_editable_ckeditor("Sustainability Content", "HOME_SUST_CONTENT") ?>
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
        <div class="row gy-3">
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
                    <?= summon_editable_ckeditor("Line 1", "HOME_SPL_INFO_LINE_1") ?>
                </div>
            </div>
            <div class="col-12">
                <div class="row g-4">
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <div class="col-2">
                            <div class="text-center mb-1 fw-bold">
                                Graph Item <?= $i ?>
                            </div>
                            <div class="small">
                                <?= summon_editable("Month", "SPL_${i}_MONTH", true) ?>
                                <div class="my-1">
                                    <?= summon_editable("Year", "SPL_${i}_YEAR", true) ?>
                                </div>
                                <?= summon_editable("Value", "SPL_${i}_VAL", true) ?>
                            </div>
                        </div>
                    <?php endfor; ?>
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

        <a href="<?= route_to("dashboard.media.news") ?>" class="my-3 btn btn-primary w-100">
            Manage News
        </a>
    </section>

    <section class="my-4 position-relative"
             style="background: url('<?= callMedia("HOME_REPORTS_BG") ?? PLACEHOLDER_IMG ?>') center;
                     background-size: cover;"
    >
        <div class="position-absolute top-0 end-0 m-2">
            <?= summon_image_button("HOME_REPORTS_BG") ?>
        </div>

        <div class="container">
            <div class="fw-semibold small text-white">
                <?= summon_editable("Reports Tag", "HOME_REPORTS_TAG") ?>
            </div>
            <div class="fw-semibold h3 text-white">
                <?= summon_editable("The Annual Reports", "HOME_REPORTS_TITLE") ?>
            </div>

            <a href="<?= route_to("dashboard.landing.ar") ?>" class="my-3 btn btn-primary w-100">
                Manage Annual Reports
            </a>
        </div>
    </section>

    <section class="my-4 container">
        <div class="fw-semibold small">
            <?= summon_editable("Contact Us Tag", "HOME_CONTACT_US_TAG") ?>
        </div>
        <div class="fw-semibold h3">
            <?= summon_editable_ckeditor("Contact Us Title", "HOME_CONTACT_US_TITLE") ?>
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

