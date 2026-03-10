<?php


$sidebar = [
    "Navbar" => [
        ["type" => "number", "name" => "header_position", "label" => "Position", "value" => @$header->position],
        ["type" => "text", "name" => "header_title", "label" => "Header Title", "value" => @$header->data['title'] ?? '', "placeholder" => "Header title"],
        [
            "type" => "checkbox_group",
            "name" => "sections",
            "label" => "Show Sections",
            "options" => [
                "home" => "Home",
                "hero" => "Hero",
                "feature" => "Feature",
                "parts" => "Parts",
                "tutorial" => "Tutorial",
                "gallery" => "Gallery",
                "contact" => "Contact"
            ],
            "selected" => @$sections
        ]

    ],
    "heroFields" => [
        ["type" => "number", "name" => "hero_position", "label" => "Position", "value" => @$hero->position],
        ["type" => "text", "name" => "hero_title", "label" => "Hero Title", "value" => @$hero->data['title'] ?? '', "placeholder" => "Hero title"],
        ["type" => "textarea", "name" => "hero_description", "label" => "Hero Description", "value" => @$hero->data['description'] ?? '', "rows" => 8, "placeholder" => "Description"],
        ["type" => "file", "name" => "hero_image", "label" => "Hero Image"],
        ["type" => "text", "name" => "hero_button_title", "label" => "Button Title", "value" => @$hero->data['button_title'] ?? '', "placeholder" => "Button Name"],
        ["type" => "select", "name" => "hero_button_color", "label" => "Button Color", "options" => @$buttonColors, "selected" => $hero->data['button_color'] ?? 'primary'],
        ["type" => "number", "name" => "hero_price", "label" => "Price", "value" => @$hero->data['price'] ?? '']
    ]

];


