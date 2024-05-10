<?php
/**
 * @var string $segment
 * @var string[] $fields
 */
?>

<script>
    window.addEventListener('load', () => {
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

                        for (const idx in responseFull) {
                            const response = responseFull[idx]
                            tableEl.innerHTML += `
                <tr data-id='tr-${response.id}' class="${idx % 2 !== 0 ? 'table-secondary' : ''}">
                    <td rowspan="3" style='vertical-align: middle'>
                        <button type="button" class="btn btn-danger btn-sm" onclick="<?=$segment?>confirmDelete('${response.id}')">
                            Delete
                        </button>
                    </td>
                    <td>ID</td>
                    <?php if (in_array("TAG", $fields)): ?>
                        <td>${response.tag_ID}</td>
                    <?php endif ?>
                    <?php if (in_array("TITLE", $fields)): ?>
                        <td>${response.title_ID}</td>
                    <?php endif ?>
                    <?php if (in_array("DESCRIPTION", $fields)): ?>
                        <td>${response.description_ID}</td>
                    <?php endif ?>
                    <?php if (in_array("URL", $fields)): ?>
                        <td class="text-center">
                            <a href="${response.url_ID}" target="_blank" rel="noreferrer" class="btn btn-success btn-sm" type="button">
                                URL
                            </a>
                        </td>
                    <?php endif ?>
                </tr>

                <tr data-id='tr-${response.id}' class="${idx % 2 !== 0 ? 'table-secondary' : ''}">
                    <td>EN</td>
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
                                URL
                            </a>
                        </td>
                    <?php endif ?>
                </tr>

                <tr data-id='tr-${response.id}' class="${idx % 2 !== 0 ? 'table-secondary' : ''}">
                    <td>CN</td>
                    <?php if (in_array("TAG", $fields)): ?>
                        <td>${response.tag_CN}</td>
                    <?php endif ?>
                    <?php if (in_array("TITLE", $fields)): ?>
                        <td>${response.title_CN}</td>
                    <?php endif ?>
                    <?php if (in_array("DESCRIPTION", $fields)): ?>
                        <td>${response.description_CN}</td>
                    <?php endif ?>
                    <?php if (in_array("URL", $fields)): ?>
                        <td class="text-center">
                            <a href="${response.url_CN}" target="_blank" rel="noreferrer" class="btn btn-success btn-sm" type="button">
                                Download
                            </a>
                        </td>
                    <?php endif ?>
                </tr>
                        `
                        }
                    })
        }
    )

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
                    <td rowspan="3">
                        <button type="button" class="btn btn-danger btn-sm" onclick="<?=$segment?>confirmDelete('${response.id}')">
                            Delete
                        </button>
                    </td>
                    <td>ID</td>
                    <?php if (in_array("TAG", $fields)): ?>
                        <td>${response.tag_ID}</td>
                    <?php endif ?>
                    <?php if (in_array("TITLE", $fields)): ?>
                        <td>${response.title_ID}</td>
                    <?php endif ?>
                    <?php if (in_array("DESCRIPTION", $fields)): ?>
                        <td>${response.description_ID}</td>
                    <?php endif ?>
                    <?php if (in_array("URL", $fields)): ?>
                        <td class="text-center">
                            <a href="${response.url_ID}" target="_blank" rel="noreferrer" class="btn btn-success btn-sm" type="button">
                                Download
                            </a>
                        </td>
                    <?php endif ?>
                </tr>

                <tr data-id='tr-${response.id}'>
                    <td>EN</td>
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

                <tr data-id='tr-${response.id}'>
                    <td>CN</td>
                    <?php if (in_array("TAG", $fields)): ?>
                        <td>${response.tag_CN}</td>
                    <?php endif ?>
                    <?php if (in_array("TITLE", $fields)): ?>
                        <td>${response.title_CN}</td>
                    <?php endif ?>
                    <?php if (in_array("DESCRIPTION", $fields)): ?>
                        <td>${response.description_CN}</td>
                    <?php endif ?>
                    <?php if (in_array("URL", $fields)): ?>
                        <td class="text-center">
                            <a href="${response.url_CN}" target="_blank" rel="noreferrer" class="btn btn-success btn-sm" type="button">
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
            for (const elem of document.querySelectorAll(`tr[data-id='tr-${id}']`)) {
                elem.remove()
            }
            Swal.fire("Success!", "Document has been removed", "success")
        }
    }

    function <?=$segment?>openCreateForm() {
        document.querySelector("body").classList.add("overflow-hidden")
        document.getElementById("<?=$segment?>createFormContainer").classList.remove("d-none")
        const bbox = document.getElementById("<?=$segment?>createFormContainer").getBoundingClientRect()
        window.scrollBy(0, bbox.top - window.screen.height + bbox.height)
    }

    function <?=$segment?>closeCreateForm() {
        document.querySelector("body").classList.remove("overflow-hidden")
        document.getElementById("<?=$segment?>createFormContainer").classList.add("d-none")
    }
</script>