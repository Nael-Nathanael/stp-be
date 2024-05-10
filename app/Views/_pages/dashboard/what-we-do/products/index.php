<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<!-- hero -->
<div class="w-100 mb-4 d-flex justify-content-center flex-column text-white position-relative"
     style="height: 300px;
             background: url('<?= callMedia("WWD_PD_HERO_BG") ?>') center;
             background-size: cover;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="opacity: .30; z-index: 100; background-color: black"></div>


    <div class="position-absolute top-0 end-0 m-2" style="z-index: 101">
        <?= summon_image_button("WWD_PD_HERO_BG") ?>
    </div>
</div>

<div>
    <section class="my-4 container">
        <div class="small fw-semibold">
            <?= summon_editable("Our Product Header Tag", "WWD_PD_HEADER_TAG") ?>
        </div>

        <div class="bg-warning pt-1" style="max-width: 100px"></div>

        <div class="h3 fw-semibold">
            <?= summon_editable_ckeditor("Our Product Header Title", "WWD_PD_HEADER_TITLE") ?>
        </div>

        <div class="fw-semibold">
            <?= summon_editable_ckeditor("Our Product Header Content", "WWD_PD_HEADER_CONTENT") ?>
        </div>
    </section>

    <section class="container my-4">
        <div class="w-100 text-end mb-3">
            <a class="btn btn-primary btn-sm" href="<?= route_to("dashboard.what-we-do.products.create") ?>">
                <i class="bi bi-plus"></i> Add Product
            </a>
        </div>

        <div class="table-responsive">
            <table class="table" id="article_table">
                <thead>
                <tr>
                    <th style="width: 1px">No</th>
                    <th style="width: 1px">Language</th>
                    <th class="w-100">
                        Product + Short Description
                    </th>
                    <th>
                        Meta
                    </th>
                    <th>
                        Keywords
                    </th>
                    <th class="text-nowrap">
                        Publish Date
                    </th>
                    <th class="text-center" width="1" data-sortable="false">Edit</th>
                    <th class="text-center" width="1" data-sortable="false">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $index => $article): ?>
                    <tr>
                        <td style="vertical-align: middle" class="text-center fw-bold"
                            rowspan="3"><?= $index + 1 ?></td>

                        <td style="vertical-align: middle">ID</td>
                        <td class="w-100">
                            <?= $article->title_ID ?><br>
                            <small><?= $article->short_description_ID ?></small>
                        </td>
                        <td class="text-nowrap">
                            <?= $article->meta_title_ID ?><br>
                            <small><?= $article->meta_description_ID ?></small>
                        </td>
                        <td class="text-nowrap">
                            <?= $article->keywords_ID ?>
                        </td>

                        <td style="vertical-align: middle" class="text-nowrap" rowspan="3">
                            <?= $article->updated_at ?? $article->created_at ?>
                        </td>
                        <td style="vertical-align: middle" class="text-center" rowspan="3">
                            <a class="btn btn-outline-primary btn-sm text-nowrap w-100 text-start"
                               href="<?= route_to("dashboard.what-we-do.products.update", $article->slug) ?>">
                                <i class="bi bi-pen me-1"></i> Edit
                            </a>
                        </td>
                        <td style="vertical-align: middle" class="text-center" rowspan="3">
                            <button type="submit"
                                    onclick="confirmBeforeDeleteArticle(this, '<?= route_to("object.articles.delete", $article->slug) ?>')"
                                    class="btn btn-outline-danger btn-sm">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle">EN</td>
                        <td class="w-100">
                            <?= $article->title_EN ?><br>
                            <small><?= $article->short_description_EN ?></small>
                        </td>
                        <td class="text-nowrap">
                            <?= $article->meta_title_EN ?><br>
                            <small><?= $article->meta_description_EN ?></small>
                        </td>
                        <td class="text-nowrap">
                            <?= $article->keywords_EN ?>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: middle">CN</td>
                        <td class="w-100">
                            <?= $article->title_CN ?><br>
                            <small><?= $article->short_description_CN ?></small>
                        </td>
                        <td class="text-nowrap">
                            <?= $article->meta_title_CN ?><br>
                            <small><?= $article->meta_description_CN ?></small>
                        </td>
                        <td class="text-nowrap">
                            <?= $article->keywords_CN ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>


<?= $this->endSection(); ?>



<?= $this->section("javascript") ?>
<script>
    async function confirmBeforeDeleteArticle(element, url) {
        /**
         * @type {{isConfirmed: boolean}} result
         */
        const result = await Swal.fire({
            title: 'Delete product?',
            text: 'Deleted product cannot be restored',
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
