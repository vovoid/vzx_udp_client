<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// get the base time
$number_of_palettes = palette_get_number_of_palettes();

echo "Number of palettes: ".$number_of_palettes."\n";
echo "***********\n";

for ($palette_index = 0; $palette_index < $number_of_palettes; $palette_index++)
{
    if ($palette_index > 0)
        echo "***********\n";
    $info = palette_get_information($palette_index);
    if (!($info instanceof response))
        continue;
    $palette_handle = $info->string_1;
    echo "Palette handle: ".$palette_handle."\n";
    echo "Palette name: ".$info->string_2."\n";
    echo "Palette color count: ".$info->integer_1."\n";
    for ($color_index = 0; $color_index < $info->integer_1; $color_index++)
    {
        $color_info = palette_get_color_information($palette_handle, $color_index);
        if (!$color_info instanceof response)
            continue;
        if ($color_index > 0)
            echo "\t***********\n";

        echo "\tColor ".$color_index." handle is: ".$color_info->string_1."\n";
        echo "\tColor ".$color_index." name is: ".$color_info->string_2."\n";
        echo "\tColor ".$color_index." H is: ".$color_info->double_1."\n";
        echo "\tColor ".$color_index." S is: ".$color_info->double_2."\n";
        echo "\tColor ".$color_index." V is: ".$color_info->double_3."\n";
    }
}
