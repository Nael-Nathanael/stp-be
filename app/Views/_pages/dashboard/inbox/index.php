<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<div id="articleForm">
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
                <div class="container">
                    <div class="font-marcellus h3 mb-0">
                        Inbox
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <?php foreach ($inboxes as $inbox): ?>
            <div class="card card-body mb-2">
                <table>
                    <tr>
                        <td nowrap class="pe-4">Received At</td>
                        <td class="w-100">: <?= $inbox->createdAt ?></td>
                    </tr>
                    <tr>
                        <td nowrap class="pe-4">From</td>
                        <td class="w-100">: <?= $inbox->first_name ?> <?= $inbox->last_name ?> (<?= $inbox->email ?>)
                        </td>
                    </tr>
                    <tr>
                        <td nowrap class="pe-4">Subject</td>
                        <td class="w-100">: <?= $inbox->subject ?></td>
                    </tr>
                    <tr>
                        <td nowrap class="pe-4">Message</td>
                        <td class="w-100">: <?= $inbox->note ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit"
                                    onclick="confirmBeforeDeleteArticle(this, '<?= route_to("object.inbox.delete", $inbox->id) ?>')"
                                    class="btn btn-outline-danger btn-sm mt-3">
                                <i class="bi bi-trash me-2"></i> Delete
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        <?php endforeach; ?>
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
            title: 'Delete message?',
            text: 'Deleted message cannot be restored',
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
