<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

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
                <?= summon_editable("(Page Title)", "HOME_HERO_TITLE", true) ?>
            </div>

            <div class="lead py-0 fw-normal">
                <?= summon_editable("(Page Subtitle)", "HOME_HERO_SUBTITLE", true) ?>
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

<div class="container my-5">
</div>


<?= $this->endSection(); ?>

