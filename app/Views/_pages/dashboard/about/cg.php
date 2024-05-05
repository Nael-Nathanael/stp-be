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
        <button
                data-bs-toggle="modal"
                onclick="onOpen()"
                data-bs-target="#exampleModal"
                class="btn btn-outline-primary w-100 h-100 py-5 d-flex justify-content-center align-items-center"
        >
            Manage "Board Committees" Document Section
        </button>

        <!-- Modal -->
        <div class="modal fade rounded" id="exampleModal"
             style="top: 20px; left: 20px; width: calc(100% - 40px); height: calc(100% - 40px)">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen mw-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Section Editor: Board Committees
                            Document</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-4">
                            <div class="ps-3">
                                <div class="small fw-semibold">
                                    <?= summon_editable("Board Committees Document Section Tag", "DOCS_BC_TAG") ?>
                                </div>

                                <div class="bg-warning pt-1" style="max-width: 100px"></div>

                                <div class="h3 fw-semibold">
                                    <?= summon_editable_ckeditor("Board Committees Document Section Title", "DOCS_BC_TITLE") ?>
                                </div>

                                <div class="fw-semibold">
                                    <?= summon_editable_ckeditor("Board Committees Document Section Content", "DOCS_BC_CONTENT") ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 position-relative h-100">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th nowrap class="w-100">File Description</th>
                                        <th nowrap>Document Link</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tableBody">

                                    </tbody>
                                </table>
                            </div>

                            <form onsubmit="onSubmit(event)" method="post"
                                  id="createForm"
                                  class="card card-body d-flex flex-column d-none gap-3 shadow shadow-sm position-absolute"
                                  style="right: 10px; bottom: 10px; width: 500px; z-index: 1001">
                                <div class="w-100 d-flex justify-content-between">
                                    <div class="h5 m-0">Add New Document</div>
                                    <div style="cursor: pointer" onclick="closeCreateForm()">
                                        <i class="bi bi-x-lg"></i>
                                    </div>
                                </div>
                                <div>
                                    <label for="description">File Description</label>
                                    <input type="text" required name="description" id="description"
                                           class="form-control">
                                </div>
                                <div>
                                    <label for="url">Document Link</label>
                                    <input type="text" required name="url" id="url"
                                           class="form-control">
                                </div>
                                <div class="text-start">
                                    <button type="submit" class="btn btn-success">
                                        Submit
                                    </button>
                                </div>
                            </form>

                            <button type="button" onclick="openCreateForm()" class="position-absolute btn btn-success"
                                    style="right: 15px; bottom: 15px; z-index: 1000">
                                <i class="bi bi-plus"></i> Add New Document
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<script data-tag="board-committees">
    async function onOpen() {
        fetch("<?= route_to("object.documents.list", "BOARD_COMMITTEES")?>")
            .then(async (response) => {
                return await response.json()
            })
            .then(
                (responseFull) => {
                    /**
                     * @type {{
                     *     description: string,
                     *     url: string
                     * }[]} responseFull
                     */
                    responseFull = [...responseFull]

                    let tableEl = document.getElementById("tableBody");

                    for (const response of responseFull) {
                        let newTr = document.createElement("tr");
                        let newTd1 = document.createElement("td");
                        let newTd2 = document.createElement("td");
                        newTd1.textContent = response.description;
                        newTd2.classList.add("text-center")
                        newTd2.innerHTML = `
        <a href="${response.url}" target="_blank" rel="noreferrer" class="btn btn-success btn-sm" type="button">
            Download
        </a>
                `;

                        newTr.appendChild(newTd1);
                        newTr.appendChild(newTd2);
                        tableEl.appendChild(newTr);
                    }
                })
    }

    function onSubmit(event) {
        event.preventDefault()

        const formData = new FormData(event.target)

        const body = {}
        for (const entry of formData.entries()) {
            body[entry[0]] = entry[1]
        }

        fetch("<?= route_to("object.documents.list", "BOARD_COMMITTEES")?>", {
            method: "POST",
            body: JSON.stringify(body),
            headers: {
                "Content-type": "application/json"
            }
        })
            .then(async (response) => {
                return await response.json()
            })
            .then(response => {
                let tableEl = document.getElementById("tableBody");
                let newTr = document.createElement("tr");
                let newTd1 = document.createElement("td");
                let newTd2 = document.createElement("td");
                newTd1.textContent = response.description;
                newTd2.innerHTML = `
        <a href="${response.url}" target="_blank" rel="noreferrer" class="btn btn-success btn-sm" type="button">
            Download
        </a>
                `;

                newTr.appendChild(newTd1);
                newTr.appendChild(newTd2);
                tableEl.appendChild(newTr);
            })
    }

    function openCreateForm() {
        document.getElementById("createForm").classList.remove("d-none")
    }

    function closeCreateForm() {
        document.getElementById("createForm").classList.add("d-none")
    }
</script>

<?= $this->endSection(); ?>
