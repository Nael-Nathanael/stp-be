<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("BNM_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>


    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("BNM_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="row align-items-center">
            <div class="h3 fw-semibold">
                <?= summon_editable_ckeditor("About Header Title", "BNM_HEADER_TITLE") ?>
            </div>

            <div class="fw-semibold">
                <?= summon_editable_ckeditor("About Header Content", "BNM_HEADER_CONTENT") ?>
            </div>
        </div>
    </section>

    <?php for ($i = 1; $i <= 6; $i++): ?>
        <section class="my-4 container">
            <div class="row">
                <div class="col-7">
                    <div class="small">
                        <?= summon_editable("Head Section $i Tag", "BNM_DIR_${i}_TAG") ?>
                    </div>

                    <div class="h3 fw-semibold">
                        <?= summon_editable_ckeditor("Head Section $i Name", "BNM_DIR_${i}_TITLE") ?>
                    </div>

                    <div class="fw-semibold">
                        <?= summon_editable_ckeditor("Head Section $i Content", "BNM_DIR_${i}_CONTENT") ?>
                    </div>
                </div>
                <div class="col-5 <?= $i % 2 == 0 ? 'order-first' : ''?>">
                    <?= summon_image_field("BNM_DIR_${i}_IMG", [1, 1], [1000, 1000]) ?>
                </div>
            </div>
        </section>

        <section class="my-4 container">
            <div class="small">
                <?= summon_editable("Division $i", "BNM_BM${i}_DIVISION") ?>
            </div>
            <?= summon_editable_ckeditor(call("BNM_BM${i}_DIVISION", 'Division') . " Members", "BNM_BM${i}_CONTENT") ?>
        </section>
    <?php endfor; ?>
</div>


<?= $this->endSection(); ?>

