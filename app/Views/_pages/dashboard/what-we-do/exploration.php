<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="min-height: 300px;
             background: url('<?= callMedia("EXPLORATION_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>


    <div class="container py-4" style="z-index: 101">
        <div class="w-50 d-flex flex-column gap-2">
            <div class="small fw-semibold">
                <?= summon_editable("(Exploration Page Tag)", "EXPLORATION_HERO_TAG") ?>
            </div>

            <div class="bg-warning pt-1" style="max-width: 100px"></div>

            <div class="py-0 fw-semibold" style="font-size: 1.5rem">
                <?= summon_editable_ckeditor("(Exploration Page Title)", "EXPLORATION_HERO_TITLE") ?>
            </div>

            <div class="lead py-0 fw-normal">
                <?= summon_editable_ckeditor("(Exploration Page Subtitle)", "EXPLORATION_HERO_SUBTITLE") ?>
            </div>
        </div>
    </div>

    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("EXPLORATION_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="row">
            <div class="col-6">
                <?= summon_image_field("EXPLORATION_HEADER_LEFT_IMG") ?>
                <div class="w-50">
                    <?= summon_image_field("EXPLORATION_HEADER_LEFT_IMG_OPT") ?>
                </div>
            </div>
            <div class="col-6">
                <div class="small fw-semibold">
                    <?= summon_editable("Exploration Header Tag", "EXPLORATION_HEADER_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable_ckeditor("Exploration Header Title", "EXPLORATION_HEADER_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable_ckeditor("Exploration Header Content", "EXPLORATION_HEADER_CONTENT") ?>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4 container">
        <div class="row">
            <div class="col-6">
                <?= summon_image_field("EXPLORATION_HEADER_LEFT_IMG_2") ?>
                <div class="w-50">
                    <?= summon_image_field("EXPLORATION_HEADER_LEFT_IMG_OPT_2") ?>
                </div>
            </div>
            <div class="col-6">
                <div class="small fw-semibold">
                    <?= summon_editable("Exploration Header Tag 2", "EXPLORATION_HEADER_TAG_2") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable_ckeditor("Exploration Header Title 2", "EXPLORATION_HEADER_TITLE_2") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable_ckeditor("Exploration Header Content 2", "EXPLORATION_HEADER_CONTENT_2") ?>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4 container">
        <div class="row">
            <div class="col-6">
                <?= summon_image_field("EXPLORATION_HEADER_LEFT_IMG_3") ?>
                <div class="w-50">
                    <?= summon_image_field("EXPLORATION_HEADER_LEFT_IMG_OPT_3") ?>
                </div>
            </div>
            <div class="col-6">
                <div class="small fw-semibold">
                    <?= summon_editable("Exploration Header Tag 3", "EXPLORATION_HEADER_TAG_3") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable_ckeditor("Exploration Header Title 3", "EXPLORATION_HEADER_TITLE_3") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable_ckeditor("Exploration Header Content 3", "EXPLORATION_HEADER_CONTENT_3") ?>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-4">
        <?= view(
            "_components/UseDoc",
            [
                "segment" => "EXPLORATION",
                "label" => "Exploration",
                "meta" => [
                    "NO_LEFT",
                ],
                "fields" => [
                    "TAG",
                    "TITLE",
                    "DESCRIPTION",
                ]
            ]
        ) ?>
    </section>

    <section class="container my-4">
        <?= summon_editable_ckeditor("Exploration Extra Content", "EXPLORATION_EXTRAS") ?>
    </section>
</div>


<?= $this->endSection(); ?>

<?= $this->section("javascript") ?>
<?= view("_components/UseDoc_js", ["segment" => "EXPLORATION"]) ?>
<?= $this->endSection(); ?>
