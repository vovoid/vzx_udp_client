<?php

enum action_t: int
{
    case unknown_command = 0;

    /**
     * Play the previous visual in the play queue
     * If positioned at the first item, this loops around to the last.
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_previous_visual = 1;

    /**
     * Play the next visual in the play queue
     * If positioned at the last item, this loops around to the first.
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_next_visual = 2;

    /**
     * Set the index to be played in the play queue
     *
     * Request options:
     *   $integer_1: index to be played
     *
     * Data fields returned on success:
     *   $integer_1: the same value as in the request's $integer_1
     *
     * Possible errors:
     *   error_index_out_of_bounds:
     *     (The requested index out of bounds)
     *     $integer_1: the number of items in the play queue
     *     $string_1: error description
     *     $string_2: error description continued
     */
    case play_queue_set_current_index = 3;

    /**
     * Get the currently playing index in the play queue
     *
     * Data fields returned on success:
     *   $integer_1: current index
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_get_current_index = 4;

    /**
     * Get the number of items in the play queue
     *
     * Data fields returned on success:
     *   $integer_1: number of items in the play queue
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_get_number_of_items = 5;

    /**
     * Get the number of available packs
     *
     * Data fields returned on success:
     *   $integer_1: number of available packs
     *
     * Possible errors:
     *   N/A
     */
    case meta_get_number_of_packs = 100;

    /**
     * Get metadata information for pack
     *
     * Request options:
     *   $integer_1: index of the pack to get info from
     *
     * Data fields returned on success:
     *   $string_1: pack handle
     *   $string_2: pack title
     *
     * Possible errors:
     *   error_index_out_of_bounds:
     *     (The pack index out of bounds)
     *     $integer_1: the number of available packs
     *     $string_1: error description
     *     $string_2: error description continued
     */
    case meta_get_pack_info = 101;

    /**
     * Load visuals metadata for pack
     *
     * Initially, controller has not loaded the metadata for visuals in the packs.
     * This is an optimization, the data is only loaded when clicking on a pack in the pack list somewhere in the
     * controller.
     * With this command you can populate this data.
     *
     * Request options:
     *   $string_1: pack handle
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   error_item_not_found:
     *     (The pack handle can not be found)
     *     $string_1: error description
     */
    case meta_load_visuals_for_pack = 102;

    /**
     * Get the number of visuals in a pack
     *
     * Request options:
     *   $string_1: pack handle
     *
     * Data fields returned on success:
     *   $integer_1: number of visuals in pack or 0 if visuals metadata has not yet been loaded from player
     *
     * Possible errors:
     *   error_item_not_found:
     *     (The pack handle can not be found)
     *     $string_1: error description
     */
    case meta_get_number_of_visuals_in_pack = 110;

    /**
     * Get pack metadata information
     *
     * Request options:
     *   $integer_1: index of the visual to get info from
     *   $string_1: pack handle
     *
     * Data fields returned on success:
     *   $string_1: visual handle
     *   $string_2: visual title
     *
     * Possible errors:
     *   error_item_not_found:
     *     (The pack handle can not be found)
     *     $string_1: error description
     *   error_index_out_of_bounds:
     *     (The visual index out of bounds)
     *     $integer_1: the number of available packs
     *     $string_1: error description
     *     $string_2: error description continued
     */
    case meta_get_visual_info = 111;

    /**
     * Request controller to load preset information from player.
     *
     * Initially, controller has not loaded the metadata for presets for the visuals.
     * This request can be narrowed down in two ways - you can request preset loading on either on pack level
     * or on pack AND visual level together.
     *
     * Request options:
     *   $string_1: pack handle [optional]
     *   $string_2: visual handle [optional; only considered when pack handle is also set]
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case preset_load_for_pack_and_visual = 120;

    /**
     * Request controller to return the number of presets defined for a specific visual.
     *
     * Request options:
     *   $string_1: pack handle
     *   $string_2: visual handle
     *
     * Data fields returned on success:
     *   $integer_1: number of presets for the visual, often 1 - the 'default' preset
     *
     * Possible errors:
     *   N/A
     *   Also note that if you misspell pack or visual, you won't be told. The result will then be 0.
     *   So, make extra sure the handles are correct.
     */
    case preset_get_number_of_presets_for_visual = 121;

    /**
     * Get preset handle by providing pack_handle, visual_handle and index.
     *
     * Request options:
     *   $string_1: pack handle
     *   $string_2: visual handle
     *   $integer_1: index
     *
     * Data fields returned on success:
     *   $string_1: preset handle
     *
     * Possible errors:
     *   error_item_not_found:
     *     (The pack handle can not be found)
     *     $string_1: error description
     */
    case preset_get_preset_handle_by_visual_and_index = 122;

}

