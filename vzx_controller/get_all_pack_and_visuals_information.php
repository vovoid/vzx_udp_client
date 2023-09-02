<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// NOTE!
// This script might have to be run twice, depending on what the user has done in the controller.
// See the documentation for action_t::meta_load_visuals_for_pack

// query for how many items are currently in the play queue
$number_of_packs = meta_get_number_of_packs();
if ($number_of_packs === FALSE) {
    die("Could not get number of packs...");
}

echo "Number of available packs: ". $number_of_packs."\n";

for ($pack_index = 0; $pack_index < $number_of_packs; $pack_index++)
{
    $possible_response = meta_get_pack_info($pack_index);
    if ($possible_response === FALSE)
    {
        echo "Could not get info about pack with index = ".$pack_index."\n";
        continue;
    }

    $response = $possible_response;

    if (!$response->is_ok())
    {
        echo "When getting pack info for pack with index ".$pack_index.": Response is not OK: ".$response->result_as_string()."\n";
        echo "Error info from server (in response):\n";
        echo "\tThe number of packs available is: ".$response->integer_1."\n";
        echo "\tThe error from server in string_1 is: ".$response->string_1."\n";
        continue;
    }

    $pack_handle = $response->string_1;
    $pack_title = $response->string_2;

    echo "Pack with index ".$pack_index." has the handle: '".$pack_handle."' and title: '".$pack_title."'\n";

    $number_of_visuals_in_pack_response = meta_get_number_of_visuals_in_pack($pack_handle);

    if (!$number_of_visuals_in_pack_response->is_ok())
    {
        echo "When getting number of visuals in pack for pack with handle: ".$pack_handle."\n";
        echo "Error info from server (in response):\n";
        echo "\tThe error from server in string_1 is: ".$response->string_1."\n";
        continue;
    }

    $number_of_visuals_in_pack = $number_of_visuals_in_pack_response->integer_1;
    if ($number_of_visuals_in_pack == 0)
    {
        echo "Visuals metadata not loaded yet, requesting load... Run this script again!\n";
        $meta_load_visuals_for_pack_result = meta_load_visuals_for_pack($pack_handle);
        continue;
    }
    echo "Number of available visual in the pack: ". $number_of_visuals_in_pack."\n";

    for ($visual_index = 0; $visual_index < $number_of_visuals_in_pack; $visual_index++)
    {
        $visual_info_response = meta_get_visual_info($pack_handle, $visual_index);
        if ($visual_info_response === FALSE)
        {
            continue;
        }

        if (!$visual_info_response->is_ok())
        {
            echo "When getting visual info for pack with handle ".$pack_handle." and visual index ".$visual_index.": ".
                "Response is not OK: ".$visual_info_response->result_as_string()."\n";
            echo "Error info from server (in response):\n";
            echo "\tThe number of visuals available is: ".$response->integer_1."\n";
            echo "\tThe error from server in string_1 is: ".$response->string_1."\n";
            continue;
        }

        $visual_pack_handle = $visual_info_response->string_1;
        $visual_handle = $visual_info_response->string_2;
        $visual_title = $visual_info_response->string_3;

        echo "\t\t\tVisual info for visual with index ".$visual_index.":\n";
        echo "\t\t\tVisual with index ".$visual_index." has the pack handle: ".$visual_pack_handle.
            " and visual handle: '".$visual_handle."' and title: '".$visual_title."'\n";
    }
}

