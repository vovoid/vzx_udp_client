<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// get the number of palettes
$number_of_palettes = palette_get_number_of_palettes();
$palette_handles = [];

for ($index = 0; $index < $number_of_palettes; $index++)
{
    $info = palette_get_information($index);
    if (!($info instanceof response))
        continue;
    $palette_handles[] = $info->string_1;
}

// a random value between 0 and $number_of_palettes - 1
$random_index = rand() % count($palette_handles);
$random_palette_handle = $palette_handles[$random_index];
palette_current_palette_set($random_palette_handle);
