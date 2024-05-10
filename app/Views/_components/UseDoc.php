<?php
/**
 * @var string $label
 * @var string $segment
 * @var string[] $meta
 * @var string[] $fields
 */

if (!isset($meta)) {
    $meta = [];
}

$langs = ["_ID" => "Bahasa Indonesia", "" => "English", "_CN" => "Chinese"]
?>

<div class="py-5">
    <div class="position-relative">
        <div class="card card-body shadow-sm px-2 py-1 mb-2 position-absolute top-0 start-50 translate-middle"
             style="z-index: 1001; width: fit-content">
            <h1 class="card-title fs-5">Section Editor: <?= $label ?>
                Document <?= isDev() ? "<code>$segment</code>" : "" ?>
            </h1>
        </div>
        <hr class="bg-primary">
    </div>

    <div class="row position-relative my-4">
        <div class="position-absolute m-2 bottom-0 end-0 d-none" id="<?= $segment ?>createFormContainer"
             style="width: min(800px, 60%)">
            <div
                    class="position-fixed top-0 end-0 w-100 h-100"
                    onclick="<?= $segment ?>closeCreateForm()"
                    onscroll="stopScroll(event)"
                    style="z-index: 2000; background-color: rgba(0,0,0,.4);overscroll-behavior: contain;">

            </div>

            <form onsubmit="<?= $segment ?>onSubmit(event)" method="post"
                  class="card card-body d-flex flex-column gap-3 shadow shadow-sm ms-auto w-100"
                  style="z-index: 2001">

                <div class="w-100 d-flex justify-content-between">
                    <div class="h6 m-0">Add New <?= $label ?> Document</div>
                    <div style="cursor: pointer" onclick="<?= $segment ?>closeCreateForm()">
                        <i class="bi bi-x-lg"></i>
                    </div>
                </div>

                <div class="row gy-2">
                    <?php if (in_array("TAG", $fields)): ?>
                        <?php foreach ($langs as $lang => $langLabel): ?>
                            <div class="col-4">
                                <div>
                                    <label for="<?= $segment ?>tag<?= $lang ?>" style="font-size: 14px">Tag <span
                                                style="font-size: 12px">in <?= $langLabel ?></span></label>
                                    <input type="text" required name="tag<?= $lang ?>"
                                           id="<?= $segment ?>tag<?= $lang ?>"
                                           data-segment="<?= $segment ?>"
                                           class="form-control form-control-sm">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif ?>
                    <?php if (in_array("TITLE", $fields)): ?>
                        <?php foreach ($langs as $lang => $langLabel): ?>
                            <div class="col-4">
                                <div>
                                    <label for="<?= $segment ?>title<?= $lang ?>" style="font-size: 14px">Title <span
                                                style="font-size: 12px">in <?= $langLabel ?></span></label>
                                    <input type="text" required name="title<?= $lang ?>"
                                           id="<?= $segment ?>title<?= $lang ?>"
                                           data-segment="<?= $segment ?>"
                                           class="form-control form-control-sm">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif ?>
                    <?php if (in_array("DESCRIPTION", $fields)): ?>
                        <?php foreach ($langs as $lang => $langLabel): ?>
                            <div class="col-4">
                                <div>
                                    <label for="<?= $segment ?>description<?= $lang ?>" style="font-size: 14px">Description <span
                                                style="font-size: 12px">in <?= $langLabel ?></span></label>
                                    <textarea type="text" required name="description<?= $lang ?>"
                                              id="<?= $segment ?>description<?= $lang ?>"
                                              data-segment="<?= $segment ?>"
                                              class="form-control form-control-sm" rows="3"></textarea>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif ?>
                    <?php if (in_array("URL", $fields)): ?>
                        <?php foreach ($langs as $lang => $langLabel): ?>
                            <div class="col-4">
                                <div>
                                    <label for="<?= $segment ?>url<?= $lang ?>" style="font-size: 14px">URL <span
                                                style="font-size: 12px">in <?= $langLabel ?></span></label>
                                    <input type="text" required name="url<?= $lang ?>"
                                           id="<?= $segment ?>url<?= $lang ?>"
                                           data-segment="<?= $segment ?>"
                                           class="form-control form-control-sm">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif ?>
                </div>

                <div class="text-start">
                    <button type="submit" class="btn btn-success">
                        Submit
                    </button>
                </div>
            </form>
        </div>

        <div class="position-absolute m-2 bottom-0 end-0" style="width: fit-content">
            <button type="button" onclick="<?= $segment ?>openCreateForm()"
                    class="btn btn-success"
                    style="z-index: 1000">
                <i class="bi bi-plus"></i> Add New Document
            </button>
        </div>

        <?php if (!in_array("NO_LEFT", $meta)): ?>
            <div class="col-4">
                <div class="small fw-semibold">
                    <?= summon_editable("$label Document Section Tag", "DOCS_${segment}_TAG") ?>
                </div>

                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                <div class="h4">
                    <?= summon_editable_ckeditor("$label Document Section Title", "DOCS_${segment}_TITLE") ?>
                </div>

                <div>
                    <?= summon_editable_ckeditor("$label Document Section Content", "DOCS_${segment}_CONTENT") ?>
                </div>
            </div>
        <?php endif ?>
        <div class="col-<?= in_array("NO_LEFT", $meta) ? "12" : "8" ?>">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th nowrap width="1"></th>
                        <th nowrap width="1">Language</th>
                        <?php if (in_array("TAG", $fields)): ?>
                            <th nowrap>Tag</th>
                        <?php endif ?>
                        <?php if (in_array("TITLE", $fields)): ?>
                            <th nowrap>Title</th>
                        <?php endif ?>
                        <?php if (in_array("DESCRIPTION", $fields)): ?>
                            <th nowrap>Description</th>
                        <?php endif ?>
                        <?php if (in_array("URL", $fields)): ?>
                            <th nowrap width="1">Document Link</th>
                        <?php endif ?>
                    </tr>
                    </thead>
                    <tbody id="<?= $segment ?>tableBody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="position-relative">
        <div class="card card-body shadow-sm px-2 py-1 mb-2 position-absolute top-0 start-50 translate-middle"
             style="z-index: 1001; width: fit-content">
            <h1 class="card-title fs-5">
                Section Editor: <?= $label ?>
                Document <?= isDev() ? "<code>$segment</code>" : "" ?>
            </h1>
        </div>
        <hr class="bg-primary">
    </div>
</div>