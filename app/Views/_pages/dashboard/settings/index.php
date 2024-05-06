<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-header fw-semibold fs-5">
                Website Settings
            </div>
            <div class="card-body d-flex gap-4">
                <div>
                    Favicon
                    <div class="d-flex gap-2">
                        <img src="<?= $GLOBALS['stp_media']->getOrPlaceholderByKey("FAVICON") ?>" width="50" height="50"
                             alt="favicon" class="rounded">
                        <div>
                            <?= summon_image_button("FAVICON") ?>
                        </div>
                    </div>
                </div>
                <div>
                    <?= summon_editable("Website Title", "TITLE", true) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-header fw-semibold fs-5">
                Logo
            </div>
            <div class="card-body d-flex gap-3">
                <div style="width: 300px">
                    Monochrome
                    <div class="bg-dark">
                        <?= summon_image_field("LOGO_MONOCHROME", [2, 1], [300, 150], 'contain') ?>
                    </div>
                </div>
                <div style="width: 300px">
                    Full Color
                    <?= summon_image_field("LOGO_COLOR", [2, 1], [300, 150], 'contain') ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-header fw-semibold fs-5">
                Menu
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <?= summon_editable("Home", "MENU_HOME", true) ?>
                    </div>
                    <div class="col">
                        <?= summon_editable("About Us", "MENU_ABOUT", true) ?>
                    </div>
                    <div class="col">
                        <?= summon_editable("What We Do", "MENU_WHATWEDO", true) ?>
                    </div>
                    <div class="col">
                        <?= summon_editable("Partnership", "MENU_PARTNERSHIPS", true) ?>
                    </div>
                    <div class="col">
                        <?= summon_editable("Sustainability", "MENU_SUSTAINABILITY", true) ?>
                    </div>
                    <div class="col">
                        <?= summon_editable("Career", "MENU_CAREER", true) ?>
                    </div>
                    <div class="col">
                        <?= summon_editable("Media", "MENU_MEDIA", true) ?>
                    </div>
                    <div class="col">
                        <?= summon_editable("Contact Us", "MENU_CONTACTUS", true) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-header fw-semibold fs-5">
                Social Media
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <?= summon_editable("Youtube", "SOCMED_YOUTUBE", true) ?>
                    </div>
                    <div class="col">
                        <?= summon_editable("Facebook", "SOCMED_FACEBOOK", true) ?>
                    </div>
                    <div class="col">
                        <?= summon_editable("X", "SOCMED_X", true) ?>
                    </div>
                    <div class="col">
                        <?= summon_editable("Instagram", "SOCMED_INSTAGRAM", true) ?>
                    </div>
                    <div class="col">
                        <?= summon_editable("LinkedIn", "SOCMED_LINKEDIN", true) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-header fw-semibold fs-5">
                Point of Contact
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <?= summon_editable_ckeditor("Contact Description 1", "POC_LINE_1") ?>
                    </div>
                    <div class="col-3">
                        <?= summon_editable_ckeditor("Contact Description 2", "POC_LINE_2") ?>
                    </div>
                    <div class="col-3">
                        <?= summon_editable("Phone 1", "POC_PHONE", true) ?>
                    </div>
                    <div class="col-3">
                        <?= summon_editable("Phone 2", "POC_PHONE_2", true) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>