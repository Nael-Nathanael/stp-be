<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<div class="container my-4">
    <div class="w-100 text-end mb-3">
        <a class="btn btn-primary btn-sm" href="<?= route_to("dashboard.landing.ar.create") ?>">
            <i class="bi bi-plus"></i> Add Annual Report
        </a>
    </div>

    <div class="table-responsive">
        <table class="table" id="article_table">
            <thead>
            <tr>
                <th style="width: 1px">No</th>
                <th style="width: 1px">Language</th>
                <th class="w-100">
                    Title + Short Description
                </th>
                <th>
                    Attachment
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
                    <td style="vertical-align: middle" class="text-center fw-bold" rowspan="3"><?= $index + 1 ?></td>

                    <td style="vertical-align: middle">ID</td>
                    <td class="w-100">
                        <?= $article->title_ID ?><br>
                        <small><?= $article->short_description_ID ?></small>
                    </td>
                    <td style="vertical-align: middle" class="text-nowrap" rowspan="3">

                        <a class="btn btn-outline-primary btn-sm text-nowrap w-100 text-start"
                           target="_blank"
                           download
                           href="<?= $article->attachmentUrl ?>">
                            <i class="bi bi-download me-1"></i> Download
                        </a>

                    </td>
                    <td style="vertical-align: middle" class="text-nowrap" rowspan="3">
                        <?= $article->updated_at ?? $article->created_at ?>
                    </td>
                    <td style="vertical-align: middle" class="text-center" rowspan="3">
                        <a class="btn btn-outline-primary btn-sm text-nowrap w-100 text-start"
                           href="<?= route_to("dashboard.landing.ar.update", $article->slug) ?>">
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
                </tr>

                <tr>
                    <td style="vertical-align: middle">CN</td>
                    <td class="w-100">
                        <?= $article->title_CN ?><br>
                        <small><?= $article->short_description_CN ?></small>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?= $this->endSection(); ?>

<?= $this->section("javascript") ?>
<script>
    async function confirmBeforeDeleteArticle(element, url) {
        /**
         * @type {{isConfirmed: boolean}} result
         */
        const result = await Swal.fire({
            title: 'Delete article?',
            text: 'Deleted article cannot be restored',
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
