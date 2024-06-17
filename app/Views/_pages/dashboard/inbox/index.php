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

    </div>
</div>
<?= $this->endSection(); ?>
