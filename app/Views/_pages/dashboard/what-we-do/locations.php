<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("WWD_LOC_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>


    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("WWD_LOC_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="small fw-semibold">
            <?= summon_editable("Our Location Header Tag", "WWD_LOC_HEADER_TAG") ?>
        </div>

        <div class="bg-warning pt-1" style="max-width: 100px"></div>

        <div class="h3 fw-semibold">
            <?= summon_editable_ckeditor("Our Location Header Title", "WWD_LOC_HEADER_TITLE") ?>
        </div>

        <div class="fw-semibold">
            <?= summon_editable_ckeditor("Our Location Header Content", "WWD_LOC_HEADER_CONTENT") ?>
        </div>
    </section>

    <section class="container my-4">
        <?= view(
            "_components/UseDoc",
            [
                "segment" => "OUR_LOCATIONS",
                "label" => "Our Locations",
                "meta" => [
                    "NO_LEFT",
                ],
                "fields" => [
                    "TAG",
                    "TITLE",
                    "DESCRIPTION",
                    "URL",
                ]
            ]
        ) ?>
    </section>


    <section class="container my-4">

        <section class="my-4 container">
            <div class="small fw-semibold">
                <?= summon_editable("Our Location Gallery Tag", "WWD_LOC_GALLERY_TAG") ?>
            </div>

            <div class="bg-warning pt-1" style="max-width: 100px"></div>
        </section>

        <div class="row g-4">
            <?php foreach ($photos as $photo): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="position-relative w-100" style="aspect-ratio: 16 / 9">
                        <div class="top-0 end-0 m-1 position-absolute">
                            <button type="submit"
                                    onclick="confirmBeforeDeleteAlbum(this, '<?= route_to("object.album.photo.delete", $photo->id) ?>')"
                                    class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                        <img src="<?= $photo->url ?>" class="w-100"
                             style="aspect-ratio: 16 / 9; object-fit: cover; object-position: center">
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
                      action="<?= route_to("object.album.photo.add", "--LOC") ?>"
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
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection(); ?>
<?= $this->section("javascript"); ?>
<?= view(
    "_components/UseDoc_js",
    [
        "segment" => "OUR_LOCATIONS",
        "label" => "Our Locations",
        "meta" => [
            "NO_LEFT",
        ],
        "fields" => [
            "TAG",
            "TITLE",
            "DESCRIPTION",
            "URL",
        ]
    ]
) ?>


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

