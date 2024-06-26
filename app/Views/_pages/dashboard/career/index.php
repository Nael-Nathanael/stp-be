<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-end flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("CAREER_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>

    <div class="container py-4" style="z-index: 101">
        <div class="w-50 d-flex flex-column gap-2">
            <div class="small fw-semibold">
                <?= summon_editable("(Career Page Tag)", "CAREER_HERO_TAG") ?>
            </div>

            <div class="bg-warning pt-1" style="max-width: 100px"></div>

            <div class="py-0 fw-semibold" style="font-size: 1.5rem">
                <?= summon_editable("(Career Page Title)", "CAREER_HERO_TITLE") ?>
            </div>

            <div class="lead py-0 fw-normal">
                <?= summon_editable("(Career Page Subtitle)", "CAREER_HERO_SUBTITLE") ?>
            </div>
        </div>
    </div>

    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("CAREER_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container p-2 border border-danger border-2" style="background-color: #f8d7da">
        <div class="h3 fw-semibold">
            <?= summon_editable("Beware Fraud Title", "CAREER_BEWARE_TITLE") ?>
        </div>

        <div class="fw-semibold">
            <?= summon_editable_ckeditor("Beware Fraud Content", "CAREER_BEWARE_SUBTITLE") ?>
        </div>
    </section>

    <section class="my-4 container">
        <div class="row align-items-center">
            <div class="col-5">
                <?= summon_image_field("CAREER_HEADER_BG") ?>
            </div>
            <div class="col-6 offset-1">
                <div class="small fw-semibold">
                    <?= summon_editable("Career Header Tag", "CAREER_HEADER_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h3 fw-semibold">
                    <?= summon_editable_ckeditor("Career Header Title", "CAREER_HEADER_TITLE") ?>
                </div>

                <div class="fw-semibold">
                    <?= summon_editable_ckeditor("Career Header Content", "CAREER_HEADER_CONTENT") ?>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4 container">
        <div class="w-100 text-end mb-3">
            <a class="btn btn-primary btn-sm" href="<?= route_to("dashboard.career.create") ?>">
                <i class="bi bi-plus"></i> Add Career
            </a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th width="1">No.</th>
                <th width="1">Deadline</th>
                <th width="1">Language</th>
                <th>Position Name</th>
                <th>Employment Status</th>
                <th>Excerpt</th>
                <th width="1"></th>
                <th width="1"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($careers as $idx => $career): ?>
                <tr>
                    <td rowspan="3"><?= $idx + 1 ?></td>
                    <td rowspan="3" nowrap><?= date("Y-m-d", strtotime($career->deadline)) ?></td>
                    <td>ID</td>
                    <td><?= $career->position_name_ID ?></td>
                    <td><?= $career->employment_status_ID ?></td>
                    <td><?= $career->excerpt_ID ?></td>
                    <td rowspan="3" style="vertical-align: middle">
                        <a class="btn btn-outline-primary btn-sm text-nowrap w-100 text-start"
                           href="<?= route_to("dashboard.career.update", $career->slug) ?>">
                            <i class="bi bi-pen me-1"></i> Edit
                        </a>
                    </td>

                    <td style="vertical-align: middle" class="text-center" rowspan="3">
                        <button type="submit"
                                onclick="confirmBeforeDeleteArticle(this, '<?= route_to("object.career.delete", $career->slug) ?>')"
                                class="btn btn-outline-danger btn-sm">
                            Delete
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>EN</td>
                    <td><?= $career->position_name_EN ?></td>
                    <td><?= $career->employment_status_EN ?></td>
                    <td><?= $career->excerpt_EN ?></td>
                </tr>
                <tr>
                    <td>CN</td>
                    <td><?= $career->position_name_CN ?></td>
                    <td><?= $career->employment_status_CN ?></td>
                    <td><?= $career->excerpt_CN ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>


<?= $this->endSection(); ?>
<?= $this->section("javascript"); ?>

<script>
    async function confirmBeforeDeleteArticle(element, url) {
        /**
         * @type {{isConfirmed: boolean}} result
         */
        const result = await Swal.fire({
            title: 'Delete career?',
            text: 'Deleted career cannot be restored',
            showCancelButton: true,
            icon: "info",
            confirmButtonText: "Confirm",
        })
        if (result.isConfirmed) {
            window.location.href = url;
        }
    }
</script>
<?= $this->endSection(); ?>

