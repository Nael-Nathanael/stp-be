<?= $this->extend("_layouts/base_layout"); ?>

<?= $this->section("content"); ?>
<?php $lang = currLang() ?>

<div>
    <section class="my-4 container">
        <?= summon_editable_ckeditor("After Submit Contact Form Message", "CONTACT_AFTER_SUBMIT", 500) ?>
    </section>
</div>

<?= $this->endSection(); ?>

