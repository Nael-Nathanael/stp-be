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

    <section class="my-5 container">
        <div class="position-relative">
            <div class="card card-body shadow-sm px-2 py-1 mb-2 position-absolute top-0 start-50 translate-middle"
                 style="z-index: 1001; width: fit-content">
                <h1 class="card-title fs-5">
                    Section Editor: History
                </h1>
            </div>
            <hr class="bg-primary">
        </div>

        <div class="py-3">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th width="1">Year</th>
                    <th width="1">Image</th>
                    <th width="1">Language</th>
                    <th>Tag</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th width="1"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($histories as $history): ?>
                    <tr>
                        <td rowspan="3"><?= $history->year ?></td>
                        <td rowspan="3">
                            <img src="<?= $history->imgUrl ?>" alt="<?= $history->year ?>" width="200"/>
                        </td>
                        <td>ID</td>
                        <td><?= $history->tag_ID ?></td>
                        <td><?= $history->title_ID ?></td>
                        <td><?= $history->description_ID ?></td>
                        <td rowspan="3" style="vertical-align: middle">
                            <button type="submit"
                                    onclick="confirmBeforeDeleteHistory('<?= route_to("object.history.delete", $history->year) ?>')"
                                    class="btn btn-outline-danger btn-sm">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>EN</td>
                        <td><?= $history->tag_EN ?></td>
                        <td><?= $history->title_EN ?></td>
                        <td><?= $history->description_EN ?></td>
                    </tr>
                    <tr>
                        <td>CN</td>
                        <td><?= $history->tag_CN ?></td>
                        <td><?= $history->title_CN ?></td>
                        <td><?= $history->description_CN ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="w-100 text-end">
                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                        data-bs-target="#addHistoryModal">
                    <i class="bi bi-plus-lg me-2"></i> Add History
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addHistoryModal" tabindex="-1" aria-labelledby="addHistoryModalLabel"
                     aria-hidden="true">
                    <form class="modal-dialog modal-dialog-centered modal-xl" method="post"
                          action="<?= route_to("object.history.create") ?>" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h1 class="modal-title fs-5" id="addHistoryModalLabel">Add History</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body row text-start gy-3">
                                <div class="col-9">
                                    <div class="form-group">
                                        <label for="year">
                                            Year
                                        </label>
                                        <input type="number"
                                               value="<?= date('y') ?>"
                                               required name="year"
                                               id="year"
                                               class="form-control form-control-sm"
                                        >
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="coverUrl">
                                            Cover Image
                                        </label>
                                        <input type="file"
                                               required
                                               name="coverUrl"
                                               id="coverUrl"
                                               class="form-control form-control-sm"
                                        >
                                    </div>
                                </div>
                                <?php foreach (["ID", "EN", "CN"] as $lang): ?>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="tag<?= $lang ?>" style="font-size: 14px">
                                                Tag <span style="font-size: 12px">in <?= $lang ?></span>
                                            </label>
                                            <input type="text" required name="tag_<?= $lang ?>"
                                                   id="tag<?= $lang ?>"
                                                   class="form-control form-control-sm"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label for="title<?= $lang ?>" style="font-size: 14px">
                                                Title <span style="font-size: 12px">in <?= $lang ?></span>
                                            </label>
                                            <input type="text" required name="title_<?= $lang ?>"
                                                   id="title<?= $lang ?>"
                                                   class="form-control form-control-sm"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label for="description<?= $lang ?>" style="font-size: 14px">
                                                Description <span style="font-size: 12px">in <?= $lang ?></span>
                                            </label>
                                            <textarea required name="description_<?= $lang ?>"
                                                      id="description<?= $lang ?>"
                                                      rows="5"
                                                      class="form-control form-control-sm"
                                            ></textarea>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="position-relative">
            <div class="card card-body shadow-sm px-2 py-1 mb-2 position-absolute top-0 start-50 translate-middle"
                 style="z-index: 1001; width: fit-content">
                <h1 class="card-title fs-5">
                    Section Editor: History
                </h1>
            </div>
            <hr class="bg-primary">
        </div>
    </section>

    <section class="my-4 container">
        <small>
            <?= summon_editable("Milestone Tag", "ABOUT_MILESTONE_TAG") ?>
        </small>

        <div class="h3">
            <?= summon_editable("Milestone Title", "ABOUT_MILESTONE_TITLE") ?>
        </div>

        <div class="p">
            <?= summon_editable("Milestone Subtitle", "ABOUT_MILESTONE_SUBTITLE") ?>
        </div>

        <div class="row">
            <div class="col-9">
                <div>
                    <small>Milestone (Desktop)</small>
                    <?= summon_image_field("ABOUT_MILESTONE_IMAGE") ?>
                </div>
            </div>
            <div class="col-3">
                <div class="h-100">
                    <small>Milestone (Phone)</small>
                    <div style="
                            aspect-ratio: 9 / 16;
                            background: url('<?= $GLOBALS['stp_media']->getOrNoneByKey("ABOUT_MILESTONE_IMAGE_SM") ?? "https://placehold.co/720x1280" ?>') center;
                            background-size: cover;
                            " class="position-relative w-100 h-100">
                        <div class="p-2 position-absolute top-0 end-0">
                            <?= summon_image_button("ABOUT_MILESTONE_IMAGE_SM") ?>
                        </div>
                    </div>
                    <div class="text-end small text-danger">*recommended 720px x 1,280px (9 : 16 ratio)</div>
                </div>
            </div>
        </div>

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
            <?php
            $subpages = [
                [
                    "name" => "Board and Management",
                    "url" => route_to("dashboard.about.bnm"),
                ],
                [
                    "name" => "Corporate Governance",
                    "url" => route_to("dashboard.about.cg"),
                ],
                [
                    "name" => "Our Code",
                    "url" => route_to("dashboard.about.oc"),
                ]
            ]
            ?>
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

                    <a href="<?= $subpages[$i - 1]['url'] ?>" class="btn btn-sm btn-primary mt-3">
                        Edit <b><?= $subpages[$i - 1]['name'] ?></b> Page
                    </a>
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
</div>


<?= $this->endSection(); ?>
<?= $this->section("javascript"); ?>

<script>
    async function confirmBeforeDeleteHistory(url) {
        /**
         * @type {{isConfirmed: boolean}} result
         */
        const result = await Swal.fire({
            title: 'Delete history?',
            text: 'Deleted history cannot be restored',
            showCancelButton: true,
            icon: "warning",
            confirmButtonText: "Confirm",
        })
        if (result.isConfirmed) {
            window.location.href = url;
        }
    }
</script>
<?= $this->endSection(); ?>

