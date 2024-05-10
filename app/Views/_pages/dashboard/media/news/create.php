<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
    <form action="<?= route_to("object.articles.create", "NEWS") ?>" method="post" id="articleForm"
          enctype="multipart/form-data">
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
                               href="<?= route_to("dashboard.media.index") ?>">
                                Media
                            </a>
                            /

                            <a class="text-light fw-lighter text-decoration-none"
                               href="<?= route_to("dashboard.media.news") ?>">
                                News
                            </a>
                            /
                            <a class="text-light fw-lighter text-decoration-none" href="#">Add News</a>
                        </div>
                        <div class="font-marcellus h3 mb-0">
                            Add News
                        </div>
                    </div>
                    <div class="flex-nowrap">
                        <button type="submit" class="btn btn-primary text-nowrap">
                            <i class="bi bi-send-fill me-2"></i> Publish
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div>
                <div class="row" style="min-height: 600px">
                    <div class="col-lg-9 border-end">
                        <div class="row">
                            <?php foreach (["ID", "EN", "CN"] as $item): ?>
                                <div class="col-4">
                                    <div class="card card-body shadow">
                                        <div class="form-group mb-2">
                                            <label for="title_<?= $item ?>" class="small">Title [<?= $item ?>]</label>
                                            <input type="text" class="form-control form-control-sm"
                                                   id="title_<?= $item ?>"
                                                   name="title_<?= $item ?>"
                                                   placeholder="Title [<?= $item ?>]"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <label class="small" for="short_description_<?= $item ?>">
                                                Short Description [<?= $item ?>]
                                            </label>
                                            <textarea required id="short_description_<?= $item ?>"
                                                      name="short_description_<?= $item ?>"
                                                      class="form-control" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php foreach (["ID", "EN", "CN"] as $item): ?>

                            <div class="my-3 card card-body shadow">
                                <h4 class="mb-2 text-center">
                                    Content [<?= $item ?>]
                                </h4>
                                <input type="hidden" name="content_<?= $item ?>" id="content_<?= $item ?>">
                                <div class="document-editor__toolbar_<?= $item ?> border"></div>
                                <div class="editor_<?= $item ?> border shadow-none bg-white"
                                     style="min-height: 400px">No Content
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                    <div class="col-lg-3 d-flex align-items-end flex-column">
                        <div class="w-100">
                            <div class="card shadow">
                                <div class="card-header h5 mb-0 justify-content-center">
                                    Post Settings
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="coverImage">Cover Image</label>
                                        <input type="file" name="coverImage" id="coverImage" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <?php foreach (["ID", "EN", "CN"] as $item): ?>
                                <div class="card shadow mt-2">
                                    <div class="card-header h5 mb-0 justify-content-center">
                                        Advance Settings [<?= $item ?>]
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="keywords_<?= $item ?>">Keywords</label>
                                            <input type="text" name="keywords_<?= $item ?>" id="keywords_<?= $item ?>"
                                                   class="form-control"
                                                   placeholder="Keywords" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="meta_title_<?= $item ?>">Meta Title</label>
                                            <input type="text" name="meta_title_<?= $item ?>"
                                                   id="meta_title_<?= $item ?>"
                                                   class="form-control"
                                                   placeholder="Meta Title" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="meta_description_<?= $item ?>">Meta Description</label>
                                            <textarea required id="meta_description_<?= $item ?>"
                                                      name="meta_description_<?= $item ?>"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?= $this->endSection(); ?>

<?= $this->section("javascript") ?>
    <script>
        function init_editor(lang) {
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

                    // Set a custom container for the toolbar.
                    document.querySelector(`.document-editor__toolbar_${lang}`).appendChild(editor.ui.view.toolbar.element);
                    document.querySelector(`.ck-toolbar_${lang}`).classList.add('ck-reset_all');
                })
        }

        init_editor("ID")
        init_editor("EN")
        init_editor("CN")
    </script>
<?= $this->endSection(); ?>