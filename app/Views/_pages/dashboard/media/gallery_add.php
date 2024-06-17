<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
    <form action="<?= route_to("object.album.create") ?>" method="post" id="album_form"
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
                               href="<?= route_to("dashboard.media.gallery") ?>">
                                Gallery
                            </a>
                            /
                            <a class="text-light fw-lighter text-decoration-none" href="#">Add Album</a>
                        </div>
                        <div class="font-marcellus h3 mb-0">
                            Add Album
                        </div>
                    </div>
                    <div class="flex-nowrap">
                        <button type="submit" class="btn btn-primary text-nowrap">
                            <i class="bi bi-save me-2"></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div>
                <div class="row" style="min-height: 600px">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="card card-body shadow">

                                    <div class="form-group mb-2">
                                        <label for="date" class="small">Album Date</label>
                                        <input type="date" class="form-control form-control-sm"
                                               id="date"
                                               name="date"
                                               placeholder="Album Date"
                                               required>
                                    </div>
                                </div>
                            </div>
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
                                            <label class="small" for="description_<?= $item ?>">
                                                Description [<?= $item ?>]
                                            </label>
                                            <textarea id="description_<?= $item ?>"
                                                      name="description_<?= $item ?>"
                                                      class="form-control" rows="4"></textarea>
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