<?php

if (!function_exists('currLang')) {
    function currLang($styled = false): string
    {
        if (!in_array(session()->get("LANG"), ["EN", "ID", "CN"])) {
            session()->set("LANG", "EN");
        }

        if ($styled) {
            switch (session()->get("LANG")) {
                case "EN":
                    return "English Language";
                case "ID":
                    return "Bahasa Indonesia";
                case "CN":
                    return "Mandarin Chinese";
            }
        }

        return session()->get("LANG");
    }
}

if (!function_exists('isDev')) {
    function isDev(): bool
    {
        if (session()->get("STP_isDev") == null) {
            session()->set("STP_isDev", false);
        }

        return session()->get("STP_isDev");
    }
}

if (!function_exists('labelLang')) {
    function labelLang($lang): string
    {
        switch ($lang) {
            case "EN":
                return "English Language";
            case "ID":
                return "Bahasa Indonesia";
            case "CN":
                return "Mandarin Chinese";
        }
        return "";
    }
}

if (!function_exists('summon_editable')) {
    function summon_editable(string $label, string $id, bool $isMultiple = false): string
    {
        return view("_components/Editable", [
            "field_id" => $id,
            "field_label" => $label,
            "field_multiple" => $isMultiple,
        ]);
    }
}

if (!function_exists('summon_editable_ckeditor')) {
    function summon_editable_ckeditor(string $label, string $id, int $min_height = 150): string
    {
        return view("_components/CKEDITOR", [
            "field_id" => $id,
            "field_label" => $label,
            "min_height" => $min_height,
        ]);
    }
}

if (!function_exists('summon_image_field')) {
    function summon_image_field(string $field_id, array $ratio = [16, 9], array $res = [1280, 720]): string
    {
        return view("_components/LinesImageClickToChangeField",
            [
                "field_id" => $field_id,
                "ratio" => $ratio,
                "res" => $res
            ]
        );
    }
}
if (!function_exists('summon_image_button')) {
    function summon_image_button(string $field_id): string
    {
        return view("_components/ButtonToChangeImage",
            [
                "field_id" => $field_id,
            ]
        );
    }
}

if (!function_exists('sendCalmSuccessMessage')) {
    function sendCalmSuccessMessage(string $message)
    {
        $session = session();
        $session->setFlashdata('success', $message);
    }
}

if (!function_exists('sendCalmErrorMessage')) {
    function sendCalmErrorMessage(string $message)
    {
        $session = session();
        $session->setFlashdata('error', $message);
    }
}

if (!function_exists('bindFlashdata')) {
    function bindFlashdata(array &$data)
    {
        $session = session();
        $data['flashdata'] = $session->getFlashdata();
    }
}

if (!function_exists('call')) {
    function call($id, $defaultValue)
    {
        $temp = $GLOBALS["stp_strings"]->getOrCreateByKey($id);
        return $temp->{currLang()} ?: $defaultValue;
    }
}

if (!function_exists('callMedia')) {
    function callMedia($id): string
    {
        return $GLOBALS["stp_media"]->getOrPlaceholderByKey($id);
    }
}