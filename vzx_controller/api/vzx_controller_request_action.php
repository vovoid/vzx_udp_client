<?php

enum action_t: int
{
    case unknown_command = 0;

    // play queue operations
    case play_queue_previous_visual = 1;
    case play_queue_next_visual = 2;

    // Set the index in the play queue
    //
    // Request options:
    //   $integer_1: index to be played
    // On success:
    //   $integer_1: the same value as in the request's $integer_1
    // Possible errors:
    //   error_index_out_of_bounds:
    //     $integer_1: the number of items in the play queue
    //     $string_1: error description
    //     $string_2: error description continued
    case play_queue_set_current_index = 3;

    // get the currently playing index
    // current_index is returned in $result_integer
    case play_queue_get_current_index = 4;

    // get the number of items in play queue
    // count is returned in $result_integer
    case play_queue_get_number_of_items = 5;

    // get the number of available packs
    case meta_get_number_of_packs = 100;

    // Get pack metadata information
    //
    // Request options:
    //   $integer_1: index of the pack to get info from
    // On success:
    //   $string_1: pack handle
    //   $string_2: pack title
    // Possible errors:
    //   error_index_out_of_bounds:
    //     $integer_1: the number of available packs
    //     $string_1: error description
    //     $string_2: error description continued
    case meta_get_pack_info = 101;

    // Load visuals metadata for pack
    //
    // Initially, controller has not loaded the metadata for visuals in the packs.
    // This is an optimization, the data is only loaded when clicking on a pack in the pack list somewhere in the
    // controller.
    // With this command you can populate this data.
    //
    // Request options:
    //   $string_1: pack handle
    // On success:
    //   no data is returned
    // Possible errors:
    //   error_item_not_found:
    //     $string_1: error description
    case meta_load_visuals_for_pack = 102;


    // Get the number of visuals in pack
    //
    // Request options:
    //   $string_1: pack handle
    // On success:
    //   $integer_1: number of visuals in pack or 0 if visuals metadata has not yet been loaded from player
    // Possible errors:
    //   error_item_not_found:
    //     $string_1: error description
    //
    case meta_get_number_of_visuals_in_pack = 110;

    // Get pack metadata information
    //
    // Request options:
    //   $integer_1: index of the visual to get info from
    //   $string_1: pack handle
    // On success:
    //   $string_1: visual handle
    //   $string_2: visual title
    // Possible errors:
    //   error_index_out_of_bounds:
    //     $integer_1: the number of available packs
    //     $string_1: error description
    //     $string_2: error description continued
    case meta_get_visual_info = 111;

}

