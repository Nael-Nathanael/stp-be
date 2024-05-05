<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="min-height: 300px;
             background: url('<?= callMedia("CG_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>


    <div class="container py-4" style="z-index: 101">
        <div class="w-50 d-flex flex-column gap-2">
            <div class="small fw-semibold">
                <?= summon_editable("(Corporate Governance Page Tag)", "CG_HERO_TAG") ?>
            </div>

            <div class="bg-warning pt-1" style="max-width: 100px"></div>

            <div class="py-0 fw-semibold" style="font-size: 1.5rem">
                <?= summon_editable_ckeditor("(Corporate Governance Page Title)", "CG_HERO_TITLE") ?>
            </div>

            <div class="lead py-0 fw-normal">
                <?= summon_editable_ckeditor("(Corporate Governance Page Subtitle)", "CG_HERO_SUBTITLE") ?>
            </div>
        </div>
    </div>

    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("CG_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="row">
            <div class="col-6">
                <div class="small fw-semibold">
                    <?= summon_editable("Corporate Governance Header Tag", "CG_HEADER_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable_ckeditor("Corporate Governance Header Title", "CG_HEADER_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable_ckeditor("Corporate Governance Header Content", "CG_HEADER_CONTENT") ?>
                </div>
            </div>
            <div class="col-6">
                <?= summon_image_field("CG_HEADER_RIGHT_IMG") ?>
                <div class="w-50">
                    <?= summon_image_field("CG_HEADER_RIGHT_IMG_OPT") ?>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-4">
        <?= view("_components/UseDoc", ["segment" => "BOARD_COMMITTEES", "label" => "Board Committees"]) ?>
    </section>

    <section class="bg-light container my-4">
        <div class="p-5 d-flex justify-content-center align-items-center">
            Coming Soon: Governance Documents Editor
        </div>
    </section>

    <section class="bg-light container my-4">
        <div class="p-5 d-flex justify-content-center align-items-center">
            Coming Soon: Requirement Standards Editor
        </div>
    </section>
</div>


<?= $this->endSection(); ?>

<?= $this->section("javascript") ?>
<?= view("_components/UseDoc_js", ["segment" => "BOARD_COMMITTEES"]) ?>
<?= $this->endSection(); ?>
