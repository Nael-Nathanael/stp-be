<?php
/**
 * @var String $field_id
 * @var String $field_label
 */
?>
<?php $strings = model("STPStrings"); ?>
<input type="hidden" name="<?= $field_id ?>" id="content_<?= $field_id ?>">
<div class="mb-3">
    <?= $field_label ?>
    <div class="document-editor__toolbar_<?= $field_id ?> border-0" id="toolbar_<?= $field_id ?>"></div>
    <div class="pb-4">
        <div id="editor<?= $field_id ?>" class="editor<?= $field_id ?> border shadow-none bg-white" style="min-height: 200px">
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        DecoupledDocumentEditor
            .create(document.querySelector('.editor<?= $field_id ?>'), {
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

                editor.setData(`<?= $strings->getOrCreateByKey($field_id)->{currLang()} ?>`)
                document.getElementById("content_<?= $field_id ?>").value = editor.getData();

                editor.model.document.on('change', () => {
                    document.getElementById("content_<?= $field_id ?>").value = editor.getData();
                    triggerSave(document.getElementById("content_<?= $field_id ?>"))
                });

                // Set a custom container for the toolbar.
                document.querySelector('#toolbar_<?= $field_id ?>').appendChild(editor.ui.view.toolbar.element);
            })
    });
</script>