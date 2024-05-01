<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-end flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("MEDIA_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>

    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("MEDIA_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="small fw-semibold">
            <?= summon_editable("Media Header Tag", "MEDIA_HEADER_TAG") ?>
        </div>

        <div class="bg-warning pt-1" style="max-width: 100px"></div>

        <div class="h3 fw-semibold">
            <?= summon_editable("Media Header Title", "MEDIA_HEADER_TITLE") ?>
        </div>

        <div class="fw-semibold">
            <?= summon_editable("Media Header Content", "MEDIA_HEADER_CONTENT") ?>
        </div>
    </section>

    <section class="my-4 container">
        <div class="small fw-semibold">
            <?= summon_editable("Announcement Tag", "MEDIA_ANNOUNCEMENT_TAG") ?>
        </div>

        <div class="bg-warning pt-1" style="max-width: 100px"></div>

        <div class="h3 fw-semibold">
            <?= summon_editable("Announcement Title", "MEDIA_ANNOUNCEMENT_TITLE") ?>
        </div>

        <div class="fw-semibold">
            <?= summon_editable("Announcement Subtitle", "MEDIA_ANNOUNCEMENT_SUBTITLE") ?>
        </div>

        <div class="my-3 bg-secondary py-5 d-flex justify-content-center align-items-center">
            Coming Soon: Announcement Editor
        </div>
    </section>

    <section class="my-4 container">
        <div class="row">
            <div class="col-6">
                <?= summon_image_field("MEDIA_NEWS_BG") ?>

                <div class="fw-semibold">
                    <?= summon_editable("News Title", "MEDIA_NEWS_TITLE") ?>
                </div>

                <?= summon_editable("News Subtitle", "MEDIA_NEWS_SUBTITLE") ?>

                <div>
                    <?= summon_editable("News Detail Button", "MEDIA_NEWS_BUTTON") ?>
                    <div class="ms-3">
                        <?= summon_editable("News Detail Button URL", "MEDIA_NEWS_BUTTON_URL") ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <?= summon_image_field("MEDIA_PRESS_BG") ?>

                <div class="fw-semibold">
                    <?= summon_editable("Press Release Title", "MEDIA_PRESS_TITLE") ?>
                </div>

                <?= summon_editable("Press Release Subtitle", "MEDIA_PRESS_SUBTITLE") ?>

                <div>
                    <?= summon_editable("Press Release Detail Button", "MEDIA_PRESS_BUTTON") ?>
                    <div class="ms-3">
                        <?= summon_editable("Press Release Detail Button URL", "MEDIA_PRESS_BUTTON_URL") ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="my-4 container">
        <div class="row">
            <div class="col-4">
                <div class="small fw-semibold">
                    <?= summon_editable("Presentations Header Tag", "MEDIA_PRESENTATIONS_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable("Presentations Title", "MEDIA_PRESENTATIONS_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable("Presentations Subtitle", "MEDIA_PRESENTATIONS_SUBTITLE") ?>
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
                    <?= summon_image_field("MEDIA_GALLERY_BG_LEFT") ?>
                </div>
                <div class="col-6 offset-1">
                    <small>
                        <?= summon_editable("Gallery Tag", "MEDIA_GALLERY_TAG") ?>
                    </small>

                    <div class="h3">
                        <?= summon_editable("Gallery Title", "MEDIA_GALLERY_TITLE") ?>
                    </div>

                    <div class="p">
                        <?= summon_editable("Gallery Subtitle", "MEDIA_GALLERY_SUBTITLE") ?>
                    </div>

                    <div>
                        <?= summon_editable("Gallery Button", "MEDIA_GALLERY_BUTTON") ?>
                        <small class="d-block ms-3">
                            <?= summon_editable("Gallery Button URL", "MEDIA_GALLERY_BUTTON_URL") ?>
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

