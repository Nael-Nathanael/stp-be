<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
    <form action="<?= route_to("object.career.update", $career->slug) ?>" method="post">
        <div class="w-100 mb-4 d-flex justify-content-end flex-column p-2 text-white position-relative"
             style="
         height: 100px;
         background-color: black;
         background-size: cover;
         ">
            <div class="position-absolute top-0 start-0 w-100 h-100"
                 style="opacity: .45; z-index: 100; background-color: black"></div>
            <div style="z-index: 101">
                <div class="d-flex justify-content-between align-items-end">
                    <div class="container-fluid">
                        <div class="small">
                            <a class="text-light fw-lighter text-decoration-none"
                               href="<?= route_to("dashboard.career.index") ?>">
                                Career
                            </a>
                            /
                            <a class="text-light fw-lighter text-decoration-none" href="#">Update Career</a>
                        </div>
                        <div class="font-marcellus h3 mb-0">
                            Update Career: <?= $career->position_name_EN ?>
                        </div>
                    </div>
                    <div class="flex-nowrap">
                        <button type="submit" class="btn btn-primary text-nowrap">
                            <i class="bi bi-send-fill me-2"></i> Publish Update
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row gy-4 overflow-hidden">
                <div class="col-6">
                    <div class="form-group mb-3 flex-grow-1">
                        <label for="deadline">Deadline</label>
                        <input type="date" name="deadline"
                               value="<?= date("Y-m-d", strtotime($career->deadline)) ?>"
                               id="deadline"
                               class="form-control"
                               placeholder="Meta Title" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3 flex-grow-1">
                        <label for="url">Register URL</label>
                        <input type="text" name="url"
                               value="<?= $career->url ?>"
                               id="url"
                               class="form-control"
                               placeholder="URL" required>
                    </div>
                </div>
                <?php foreach (["ID", "EN", "CN"] as $item): ?>
                    <div class="col-4 border-start border-end">
                        <div class="card-header h5 mb-0 justify-content-center">
                            Career Content [<?= $item ?>]
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="position_name_<?= $item ?>">Position Name</label>
                                <input type="text" name="position_name_<?= $item ?>"
                                       value="<?= $career->{"position_name_$item"} ?>"
                                       id="position_name_<?= $item ?>"
                                       class="form-control"
                                       placeholder="Position Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="excerpt_<?= $item ?>">Short Description</label>
                                <textarea name="excerpt_<?= $item ?>"
                                          id="excerpt_<?= $item ?>"
                                          class="form-control"
                                          placeholder="Short Description"
                                          required><?= $career->{"excerpt_$item"} ?></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="location_<?= $item ?>">Location</label>
                                <input type="text" name="location_<?= $item ?>"
                                       id="location_<?= $item ?>"
                                       value="<?= $career->{"location_$item"} ?>"
                                       class="form-control"
                                       placeholder="Location" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="employment_status_<?= $item ?>">Employment Status</label>
                                <input type="text" name="employment_status_<?= $item ?>"
                                       value="<?= $career->{"employment_status_$item"} ?>"
                                       id="employment_status_<?= $item ?>"
                                       class="form-control"
                                       placeholder="Employment Status" required>
                            </div>
                            <div class="mb-3 w-100">
                                <div class="mb-2">
                                    Responsibilities
                                </div>
                                <input type="hidden" name="content_<?= $item ?>"
                                       id="content_<?= $item ?>">
                                <div class="document-editor__toolbar_<?= $item ?> border"></div>
                                <div class="editor_<?= $item ?> border shadow-none bg-white w-100"
                                     style="min-height: 400px">No Content
                                </div>
                            </div>

                            <div class="w-100">
                                <div class="mb-2">
                                    Requirements
                                </div>
                                <input type="hidden" name="content_req_<?= $item ?>"
                                       id="content_req_<?= $item ?>">
                                <div class="document-editor__toolbar_req_<?= $item ?> border"></div>
                                <div class="editor_req_<?= $item ?> border shadow-none bg-white"
                                     style="min-height: 400px">No Content
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </form>
<?= $this->endSection(); ?>

<?= $this->section("javascript") ?>
    <script>
        function init_editor(lang, existingData) {
            DecoupledDocumentEditor
                .create(document.querySelector(`.editor_${lang}`), {
                    extraPlugins: [MyCustomUploadAdapterPlugin],
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'fontSize',
                            'fontFamily',
                            '|',
                            'fontColor',
                            'fontBackgroundColor',
                            '|',
                            'bold',
                            'italic',
                            'underline',
                            'strikethrough',
                            '|',
                            'alignment',
                            '|',
                            'numberedList',
                            'bulletedList',
                            '|',
                            'outdent',
                            'indent',
                            '|',
                            'todoList',
                            'link',
                            'blockQuote',
                            'imageUpload',
                            'insertTable',
                            'mediaEmbed',
                            '|',
                            'undo',
                            'redo',
                            'imageInsert'
                        ]
                    },
                    language: 'en',
                    image: {
                        toolbar: [
                            'imageTextAlternative',
                            'imageStyle:inline',
                            'imageStyle:block',
                            'imageStyle:side'
                        ]
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells',
                            'tableCellProperties',
                            'tableProperties'
                        ]
                    },
                    licenseKey: '',
                })
                .then(editor => {
                    window.editor = editor;

                    editor.model.document.on(`change`, () => {
                        document.getElementById(`content_${lang}`).value = editor.getData();
                    });

                    editor.setData(existingData)
                    document.getElementById(`content_${lang}`).value = editor.getData()

                    // Set a custom container for the toolbar.
                    document.querySelector(`.document-editor__toolbar_${lang}`).appendChild(editor.ui.view.toolbar.element);
                    document.querySelector(`.ck-toolbar_${lang}`).classList.add('ck-reset_all');
                })
        }

        <?php foreach (["ID", "EN", "CN"] as $item): ?>
        init_editor("<?= $item ?>", `<?= $career->{"responsibilities_$item"}?>`)
        init_editor("req_<?= $item ?>", `<?= $career->{"requirements_$item"} ?>`)
        <?php endforeach; ?>
    </script>
<?= $this->endSection(); ?>