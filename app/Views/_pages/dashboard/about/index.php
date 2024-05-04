<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("ABOUT_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>


    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("ABOUT_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="small fw-semibold">
                    <?= summon_editable("About Header Tag", "ABOUT_HEADER_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable_ckeditor("About Header Title", "ABOUT_HEADER_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable_ckeditor("About Header Content", "ABOUT_HEADER_CONTENT") ?>
                </div>
            </div>
            <div class="col-6">
                <?= summon_image_field("ABOUT_HEADER_RIGHT_IMG") ?>
            </div>
        </div>
    </section>

    <section class="my-4">
        <div class="w-100">
            <div class="row w-100">
                <div class="col-4">
                    <?= summon_image_field("ABOUT_VM_BG") ?>
                </div>
                <div class="col-7 offset-1">
                    <small>
                        <?= summon_editable("Vision & Mission Tag", "ABOUT_VM_TAG") ?>
                    </small>

                    <div class="h3">
                        <?= summon_editable("Vision", "ABOUT_VM_VISION_TITLE") ?>
                    </div>

                    <div class="p">
                        <?= summon_editable_ckeditor("Our vision is...", "ABOUT_VM_VISION_CONTENT") ?>
                    </div>

                    <div class="h3">
                        <?= summon_editable("MISSION", "ABOUT_VM_MISSION_TITLE") ?>
                    </div>

                    <div class="p">
                        <?= summon_editable_ckeditor("Our vision is...", "ABOUT_VM_MISSION_CONTENT") ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light container my-4">
        <div class="p-5 d-flex justify-content-center align-items-center">
            Coming Soon: History Editor
        </div>
    </section>

    <section class="container my-4">
        <small>
            <?= summon_editable("Milestone Tag", "ABOUT_MILESTONE_TAG") ?>
        </small>

        <div class="h3">
            <?= summon_editable("Milestone Title", "ABOUT_MILESTONE_TITLE") ?>
        </div>

        <div class="p">
            <?= summon_editable("Milestone Subtitle", "ABOUT_MILESTONE_SUBTITLE") ?>
        </div>

        <?= summon_image_field("ABOUT_MILESTONE_IMAGE") ?>

        <small>
            Image for Phone
            <?= summon_image_field("ABOUT_MILESTONE_IMAGE_SM") ?>
        </small>
    </section>


    <section class="container my-4">
        <small>
            <?= summon_editable("About More Tag", "ABOUT_MORE_TAG") ?>
        </small>

        <div class="h3">
            <?= summon_editable("About More Title", "ABOUT_MORE_TITLE") ?>
        </div>

        <div class="p">
            <?= summon_editable("About More Subtitle", "ABOUT_MORE__SUBTITLE") ?>
        </div>

        <div class="row">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <div class="col-4">
                    <?= summon_image_field("ABOUT_MORE_$i") ?>

                    <div class="h4">
                        <?= summon_editable("__ We __", "ABOUT_MORE_${i}_title") ?>
                    </div>

                    <?= summon_editable("We __", "ABOUT_MORE_${i}_content", true) ?>

                    <small>
                        <?= summon_editable("Learn More Button", "ABOUT_MORE_${i}_button") ?>
                        <small class="d-block ms-4">
                            <?= summon_editable("Button's URL", "ABOUT_MORE_${i}_button_url") ?>
                        </small>
                    </small>
                </div>
            <?php endfor ?>
        </div>
    </section>


    <section class="mt-4 bg-warning text-dark">
        <div class="container">
            <small>
                <?= summon_editable("Charter Tag", "ABOUT_CHARTER_TAG") ?>
            </small>

            <div class="h3">
                <?= summon_editable("Charter Title", "ABOUT_CHARTER_TITLE") ?>
            </div>

            <div class="row g-4">
                <?php for ($i = 1; $i <= 6; $i++) : ?>
                    <div class="col-4">
                        <div class="d-flex gap-2 align-items-start">
                            <div style="
                                    aspect-ratio: 1 / 1;
                                    width: 100px;
                                    background: url('<?= $GLOBALS['stp_media']->getOrPlaceholderByKey("ABOUT_CHARTER_$i") ?>') center;
                                    background-size: cover;
                                    " class="position-relative">
                            </div>
                            <?= summon_image_button("ABOUT_CHARTER_$i") ?>
                        </div>

                        <div class="h4 mb-0">
                            <?= summon_editable("__ We __", "ABOUT_CHARTER_${i}_title") ?>
                        </div>

                        <?= summon_editable_ckeditor("We __", "ABOUT_CHARTER_${i}_content") ?>
                    </div>
                <?php endfor ?>
            </div>
        </div>
    </section>

    <section class="py-5 bg-dark d-flex justify-content-center align-items-center text-white">
        Footer
    </section>
</div>


<?= $this->endSection(); ?>

