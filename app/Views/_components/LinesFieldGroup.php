<?php /** @var Array $fields */
foreach ($fields as $field): ?>
    <?= view("_components/" . $field['type'],
        [
            "field_label" => $field['label'] ?? "",
            "field_id" => $field['id'] ?? "",
        ]
    ) ?>
<?php endforeach; ?>
