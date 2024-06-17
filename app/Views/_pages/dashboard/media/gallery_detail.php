<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
    <div id="album_detail">
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

                            <a class="text-light fw-lighter text-decoration-none" href="#">
                                Detail
                            </a>
                        </div>
                        <div class="font-marcellus h3 mb-0">
                            <?= $album->{'title_' . currLang()} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row g-4">
                <?php foreach ($album->photos as $photo): ?>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="position-relative w-100" style="aspect-ratio: 16 / 9">
                            <div class="top-0 end-0 m-1 position-absolute">
                                <button type="submit"
                                        onclick="confirmBeforeDeleteAlbum(this, '<?= route_to("object.album.photo.delete", $photo->id) ?>')"
                                        class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                            <img src="<?= $photo->url ?>" class="w-100"
                                 style="aspect-ratio: 16 / 9; object-fit: cover; object-position: center"
                                 alt="<?= $photo->description_EN ?>">
                        </div>

                        <div class="mt-2">
                            <div class="<?= currLang() == "ID" ? '' : 'small' ?>">
                                [ID] <?= $photo->description_ID ?></div>
                            <div class="<?= currLang() == "ID" ? '' : 'small' ?>">
                                [EN] <?= $photo->description_EN ?></div>
                            <div class="<?= currLang() == "ID" ? '' : 'small' ?>">
                                [CN] <?= $photo->description_CN ?></div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="text-center">

                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                        data-bs-target="#addPhoto">
                    <i class="bi bi-plus-lg me-2"></i> Upload New Photo
                </button>

                <div class="modal fade" id="addPhoto" tabindex="-1" aria-labelledby="addPhotoLabel"
                     aria-hidden="true">
                    <form class="modal-dialog modal-dialog-centered modal-xl" method="post"
                          action="<?= route_to("object.album.photo.add", $album->slug) ?>"
                          enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h1 class="modal-title fs-5" id="addPhotoLabel">Upload New Photo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body row text-start gy-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="coverUrl">
                                            Select Image
                                        </label>
                                        <input type="file"
                                               required
                                               name="img"
                                               id="img"
                                               class="form-control form-control-sm"
                                        >
                                    </div>
                                </div>

                                <?php foreach (["ID", "EN", "CN"] as $item): ?>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="small" for="description_<?= $item ?>">
                                                Description [<?= $item ?>]
                                            </label>
                                            <textarea id="description_<?= $item ?>"
                                                      name="description_<?= $item ?>"
                                                      class="form-control" rows="4"></textarea>
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
    </div>
<?= $this->endSection(); ?>
<?= $this->section("javascript"); ?>
    <script>
        async function confirmBeforeDeleteAlbum(element, url) {
            /**
             * @type {{isConfirmed: boolean}} result
             */
            const result = await Swal.fire({
                title: 'Delete photo?',
                text: 'Deleted photo cannot be restored',
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