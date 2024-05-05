<?php
/**
 * @var string $segment
 * @var string[] $fields
 */
?>

<script>
    async function <?=$segment?>onOpen() {
        fetch("<?= route_to("object.documents.list", $segment)?>")
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

                    let tableEl = document.getElementById("<?=$segment?>tableBody");
                    tableEl.innerHTML = ""

                    for (const response of responseFull) {
                        tableEl.innerHTML += `
                            <tr data-id='tr-${response.id}'>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="<?=$segment?>confirmDelete('${response.id}')">
                                        Delete
                                    </button>
                                </td>
                                <?php if (in_array("TAG", $fields)): ?>
                                    <td>${response.tag}</td>
                                <?php endif ?>
                                <?php if (in_array("TITLE", $fields)): ?>
                                    <td>${response.title}</td>
                                <?php endif ?>
                                <?php if (in_array("DESCRIPTION", $fields)): ?>
                                    <td>${response.description}</td>
                                <?php endif ?>
                                <?php if (in_array("URL", $fields)): ?>
                                    <td class="text-center">
                                        <a href="${response.url}" target="_blank" rel="noreferrer" class="btn btn-success btn-sm" type="button">
                                            Download
                                        </a>
                                    </td>
                                <?php endif ?>
                            </tr>
                        `
                    }
                })
    }

    function <?=$segment?>onSubmit(event) {
        event.preventDefault()

        const formData = new FormData(event.target)

        const body = {}
        for (const entry of formData.entries()) {
            body[entry[0]] = entry[1]
        }

        fetch("<?= route_to("object.documents.list", $segment)?>", {
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
                let tableEl = document.getElementById("<?=$segment?>tableBody");
                tableEl.innerHTML += `
                <tr data-id='tr-${response.id}'>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" onclick="<?=$segment?>confirmDelete('${response.id}')">
                            Delete
                        </button>
                    </td>
                    <?php if (in_array("TAG", $fields)): ?>
                        <td>${response.tag}</td>
                    <?php endif ?>
                    <?php if (in_array("TITLE", $fields)): ?>
                        <td>${response.title}</td>
                    <?php endif ?>
                    <?php if (in_array("DESCRIPTION", $fields)): ?>
                        <td>${response.description}</td>
                    <?php endif ?>
                    <?php if (in_array("URL", $fields)): ?>
                        <td class="text-center">
                            <a href="${response.url}" target="_blank" rel="noreferrer" class="btn btn-success btn-sm" type="button">
                                Download
                            </a>
                        </td>
                    <?php endif ?>
                </tr>
            `

                const inputs = document.querySelectorAll("input[data-segment='<?=$segment?>']")
                for (const input of inputs) {
                    input.value = ""
                }

                const textareas = document.querySelectorAll("textarea[data-segment='<?=$segment?>']")
                for (const textarea of textareas) {
                    textarea.value = ""
                }

                <?=$segment?>closeCreateForm()

                Swal.fire("Success!", "Document registered successfully", "success")
            })
    }

    async function <?=$segment?>confirmDelete(id) {
        const url = "<?= base_url("/object/documents/$segment") ?>/" + id
        const deleted = await confirmBeforeDelete(url, "Remove this document from the list?", "Removed document cannot be restored");
        if (deleted) {
            document.querySelector(`tr[data-id='tr-${id}']`).remove()
            Swal.fire("Success!", "Document has been removed", "success")
        }
    }

    function <?=$segment?>openCreateForm() {
        document.getElementById("<?=$segment?>createForm").classList.remove("d-none")
    }

    function <?=$segment?>closeCreateForm() {
        document.getElementById("<?=$segment?>createForm").classList.add("d-none")
    }
</script>