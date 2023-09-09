<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// NOTE!
// This script might have to be run twice, depending on what the user has done in the controller.
// See the documentation for action_t::meta_load_visuals_for_pack

// query for how many items are currently in the play queue
$number_of_packs = meta_get_number_of_packs();
if ($number_of_packs === FALSE)
{
    die("Could not get number of packs...");
}

echo "Number of available packs: " . $number_of_packs . "\n";

for ($pack_index = 0; $pack_index < $number_of_packs; $pack_index++)
{
    $possible_response = meta_get_pack_info($pack_index);
    if ($possible_response === FALSE)
    {
        echo "Could not get info about pack with index = " . $pack_index . "\n";
        continue;
    }

    $response = $possible_response;

    if (!$response->is_ok())
    {
        echo "When getting pack info for pack with index " . $pack_index . ": Response is not OK: " . $response->result_as_string() . "\n";
        echo "Error info from server (in response):\n";
        echo "\tThe number of packs available is: " . $response->integer_1 . "\n";
        echo "\tThe error from server in string_1 is: " . $response->string_1 . "\n";
        continue;
    }

    $pack_handle = $response->string_1;
    $pack_title = $response->string_2;

    echo "Pack with index " . $pack_index . " has the handle: '" . $pack_handle . "' and title: '" . $pack_title . "'\n";

    $number_of_visuals_in_pack_response = meta_get_number_of_visuals_in_pack($pack_handle);

    if (!$number_of_visuals_in_pack_response->is_ok())
    {
        echo "When getting number of visuals in pack for pack with handle: " . $pack_handle . "\n";
        echo "Error info from server (in response):\n";
        echo "\tThe error from server in string_1 is: " . $response->string_1 . "\n";
        continue;
    }

    $number_of_visuals_in_pack = $number_of_visuals_in_pack_response->integer_1;
    if ($number_of_visuals_in_pack == 0)
    {
        echo "Visuals metadata not loaded yet, requesting load... Run this script again!\n";
        $meta_load_visuals_for_pack_result = meta_load_visuals_for_pack($pack_handle);
        $preset_load_for_pack_result = preset_load_for_pack($pack_handle);
        continue;
    }
    echo "Number of available visual in the pack: " . $number_of_visuals_in_pack . "\n";

    for ($visual_index = 0; $visual_index < $number_of_visuals_in_pack; $visual_index++)
    {
        $visual_info_response = meta_get_visual_info($pack_handle, $visual_index);
        if ($visual_info_response === FALSE)
        {
            continue;
        }

        if (!$visual_info_response->is_ok())
        {
            echo "When getting visual info for pack with handle " . $pack_handle . " and visual index " . $visual_index . ": " .
                "Response is not OK: " . $visual_info_response->result_as_string() . "\n";
            echo "Error info from server (in response):\n";
            if ($visual_info_response->result == result_t::error_item_not_found)
            {
                echo "\tThe error from server in string_1 is: " . $visual_info_response->string_1 . "\n";
            }
            if ($visual_info_response->result == result_t::error_index_out_of_bounds)
            {
                echo "\tThe number of visuals available is: " . $visual_info_response->integer_1 . "\n";
                echo "\tThe error from server in string_1 is: " . $visual_info_response->string_1 . "\n";
            }
            continue;
        }

        $visual_pack_handle = $visual_info_response->string_1;
        $visual_handle = $visual_info_response->string_2;
        $visual_title = $visual_info_response->string_3;

        echo "\t\t\tVisual info for visual with index " . $visual_index . ":\n";
        echo "\t\t\tVisual with index " . $visual_index . " has the pack handle: " . $visual_pack_handle .
            " and visual handle: '" . $visual_handle . "' and title: '" . $visual_title . "'\n";

        // presets
        $preset_count = preset_get_number_of_presets_for_visual($visual_pack_handle, $visual_handle);
        if ($preset_count === FALSE)
        {
            echo "\t\t\tCall to server for number of presets for visual failed...";
            continue;
        }

        if (is_int($preset_count))
        {
            echo "\t\t\tNumber of presets: ".$preset_count."\n";
            for ($preset_index = 0; $preset_index < $preset_count; $preset_index++)
            {
                $possible_preset_handle_result = preset_get_preset_handle_by_visual_and_index($visual_pack_handle, $visual_handle, $preset_index);
                if ($possible_preset_handle_result === FALSE)
                {
                    echo "\t\t\tCall to server for preset_get_preset_handle_by_visual_and_index failed...";
                    continue;
                }
                $preset_handle_result = $possible_preset_handle_result;
                if (!$preset_handle_result->is_ok())
                {
                    echo "\t\t\tWhen getting preset handle for pack with handle " . $pack_handle . ", visual with visual handle ".$visual_handle." and preset index " . $preset_index . ": " .
                        "Response is not OK: " . $visual_info_response->result_as_string() . "\n";
                    echo "\t\t\tError info from server (in response):\n";
                    if ($visual_info_response->result == result_t::error_item_not_found)
                    {
                        echo "\t\t\t\tThe error from server in string_1 is: " . $visual_info_response->string_1 . "\n";
                    }
                    continue;
                }

                echo "\t\t\tPreset handle for index ".$preset_index." is: ".$preset_handle_result->string_1."\n";
            }
        }
    }
}

