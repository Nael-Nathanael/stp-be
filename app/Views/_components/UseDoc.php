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
?>

<button
        data-bs-toggle="modal"
        onclick="<?= $segment ?>onOpen()"
        data-bs-target="#<?= $segment ?>-MODAL"
        class="btn btn-outline-primary w-100 h-100 py-5 d-flex justify-content-center align-items-center"
>
    Manage "<?= $label ?>" Document Section
</button>

<!-- Modal -->
<div class="modal fade rounded" id="<?= $segment ?>-MODAL"
     style="top: 20px; left: 20px; width: calc(100% - 40px); height: calc(100% - 40px)">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen mw-100">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Section Editor: <?= $label ?>
                    Document <?= isDev() ? "<code>$segment</code>" : "" ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <?php if (!in_array("NO_LEFT", $meta)): ?>
                    <div class="col-4">
                        <div class="ps-3">
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
                    </div>
                <?php endif ?>
                <div class="col-<?= in_array("NO_LEFT", $meta) ? "12" : "8" ?> position-relative h-100">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th nowrap width="1"></th>
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

                    <form onsubmit="<?= $segment ?>onSubmit(event)" method="post"
                          id="<?= $segment ?>createForm"
                          class="card card-body d-flex flex-column d-none gap-3 shadow shadow-sm position-absolute"
                          style="right: 10px; bottom: 10px; width: 500px; z-index: 1001">
                        <div class="w-100 d-flex justify-content-between">
                            <div class="h5 m-0">Add New <?= $label ?> Document</div>
                            <div style="cursor: pointer" onclick="<?= $segment ?>closeCreateForm()">
                                <i class="bi bi-x-lg"></i>
                            </div>
                        </div>

                        <?php if (in_array("TAG", $fields)): ?>
                            <div>
                                <label for="<?= $segment ?>tag">Tag</label>
                                <input type="text" required name="tag" id="<?= $segment ?>tag"
                                       data-segment="<?= $segment ?>"
                                       class="form-control">
                            </div>
                        <?php endif ?>
                        <?php if (in_array("TITLE", $fields)): ?>
                            <div>
                                <label for="<?= $segment ?>title">Title</label>
                                <input type="text" required name="title" id="<?= $segment ?>title"
                                       data-segment="<?= $segment ?>"
                                       class="form-control">
                            </div>
                        <?php endif ?>
                        <?php if (in_array("DESCRIPTION", $fields)): ?>
                            <div>
                                <label for="<?= $segment ?>description">Description</label>
                                <textarea type="text" required name="description" id="<?= $segment ?>description"
                                          data-segment="<?= $segment ?>"
                                          class="form-control" rows="3"></textarea>
                            </div>
                        <?php endif ?>
                        <?php if (in_array("URL", $fields)): ?>
                            <div>
                                <label for="<?= $segment ?>url">URL</label>
                                <input type="text" required name="url" id="<?= $segment ?>url"
                                       data-segment="<?= $segment ?>"
                                       class="form-control"/>
                            </div>
                        <?php endif ?>
                        <div class="text-start">
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </form>

                    <button type="button" onclick="<?= $segment ?>openCreateForm()"
                            class="position-absolute btn btn-success"
                            style="right: 15px; bottom: 15px; z-index: 1000">
                        <i class="bi bi-plus"></i> Add New Document
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>