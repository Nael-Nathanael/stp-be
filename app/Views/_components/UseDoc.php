<?php
/**
 * @var string $label
 * @var string $segment
 */
?>

<button
        data-bs-toggle="modal"
        onclick="<?= $segment ?>onOpen()"
        data-bs-target="#exampleModal"
        class="btn btn-outline-primary w-100 h-100 py-5 d-flex justify-content-center align-items-center"
>
    Manage "<?= $label ?>" Document Section
</button>

<!-- Modal -->
<div class="modal fade rounded" id="exampleModal"
     style="top: 20px; left: 20px; width: calc(100% - 40px); height: calc(100% - 40px)">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen mw-100">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Section Editor: <?= $label ?>
                    Document</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col-4">
                    <div class="ps-3">
                        <div class="small fw-semibold">
                            <?= summon_editable("$label Document Section Tag", "DOCS_${segment}_TAG") ?>
                        </div>

                        <div class="bg-warning pt-1" style="max-width: 100px"></div>

                        <div class="h3 fw-semibold">
                            <?= summon_editable_ckeditor("$label Document Section Title", "DOCS_${segment}_TITLE") ?>
                        </div>

                        <div class="fw-semibold">
                            <?= summon_editable_ckeditor("$label Document Section Content", "DOCS_${segment}_CONTENT") ?>
                        </div>
                    </div>
                </div>
                <div class="col-8 position-relative h-100">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th nowrap></th>
                                <th nowrap class="w-100">File Description</th>
                                <th nowrap>Document Link</th>
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
                            <div class="h5 m-0">Add New Document</div>
                            <div style="cursor: pointer" onclick="<?= $segment ?>closeCreateForm()">
                                <i class="bi bi-x-lg"></i>
                            </div>
                        </div>
                        <div>
                            <label for="description">File Description</label>
                            <input type="text" required name="description" id="description"
                                   data-segment="<?= $segment ?>"
                                   class="form-control">
                        </div>
                        <div>
                            <label for="url">Document Link</label>
                            <input type="text" required name="url" id="url"
                                   data-segment="<?= $segment ?>"
                                   class="form-control">
                        </div>
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