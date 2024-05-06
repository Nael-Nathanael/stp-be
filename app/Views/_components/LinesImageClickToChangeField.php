<?php
/**
 * @var String $field_id
 * @var String $fit
 * @var Array $ratio
 * @var Array $res
 * @var STPMedia $medias
 */

use App\Models\STPMedia;

$medias = model("STPMedia");
?>

<div class="position-relative">
    <img src="<?= $medias->getOrNoneByKey($field_id) ?? "https://via.placeholder.com/$res[0]x$res[1].png" ?>"
         class="w-100 rounded" alt=""
         style="aspect-ratio: <?= $ratio[0] ?> / <?= $ratio[1] ?>; object-fit: <?= $fit ?>;">
    <div class="position-absolute top-0 end-0 m-2">
        <?= summon_image_button($field_id) ?>
    </div>
    <div class="text-end small text-danger">*recommended <?= $res[0] ?>px x <?= $res[1] ?>px
        (<?= $ratio[0] ?> : <?= $ratio[1] ?> ratio)
    </div>
</div>