<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 d-flex justify-content-center flex-column text-white position-relative"
     style="height: 80vh;
             background: url('<?= callMedia("CONTACT_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>

    <div class="container py-4" style="z-index: 101">
        <div class="row">
            <div class="col-6 d-flex flex-column gap-2">
                <div class="small fw-semibold">
                    <?= summon_editable("(Contact Page Tag)", "CONTACT_HERO_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="py-0 fw-semibold" style="font-size: 1.5rem">
                    <?= summon_editable_ckeditor("(Contact Page Title)", "CONTACT_HERO_TITLE") ?>
                </div>

                <div class="lead py-0 fw-normal">
                    <?= summon_editable_ckeditor("(Contact Page Subtitle)", "CONTACT_HERO_SUBTITLE") ?>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <?= summon_editable("(First Name Field)", "CONTACT_FIELD_FIRST_NAME") ?>
                    </div>
                    <div class="col-6">
                        <?= summon_editable("(Last Name Field)", "CONTACT_FIELD_LAST_NAME") ?>
                    </div>
                    <div class="col-6">
                        <?= summon_editable("(Email Field)", "CONTACT_FIELD_EMAIL") ?>
                    </div>
                    <div class="col-6">
                        <?= summon_editable("(Subject Field)", "CONTACT_FIELD_SUBJECT") ?>
                    </div>
                    <div class="col-12">
                        <?= summon_editable("(Description Field)", "CONTACT_FIELD_DESCRIPTION") ?>
                    </div>
                    <div class="col-12">
                        <?= summon_editable("(Send Button)", "CONTACT_FIELD_SEND_BUTTON") ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("CONTACT_HERO_BG") ?>
    </div>
</div>


<?= $this->endSection(); ?>

