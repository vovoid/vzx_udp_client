<?php

enum action_t: int
{
    case unknown_command = 0;

    //---------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------
    //--- P L A Y   Q U E U E   P R O G R E S S I O N ---------------------------------------------
    //---------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------

    /**
     * Start the automatic progression between visuals
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_progression_play = 1;

    /**
     * Stop the automatic progression between visuals
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_progression_stop = 2;

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
    case play_queue_progression_previous_visual = 3;

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
    case play_queue_progression_next_visual = 4;

    /**
     * Get the currently playing index in the play queue
     *
     * Data fields returned on success:
     *   $integer_1: current index
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_progression_get_current_index = 10;

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
    case play_queue_progression_set_current_index = 11;

    /**
     * Get the current base time value
     *
     * Request options:
     *   N/A
     *
     * Data fields returned on success:
     *   $double_1: current base time (seconds)
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_progression_base_time_get = 20;

    /**
     * Set the current base time value
     *
     * Request options:
     *    $double_1: new base time value (seconds)
     *
     * Data fields returned on success:
     *   $double_1: the same value provided in the request
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_progression_base_time_set = 21;

    /**
     * Get the current random factor value
     *
     * Request options:
     *   N/A
     *
     * Data fields returned on success:
     *   $double_1: current random factor
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_progression_random_factor_get = 30;

    /**
     * Set the current base time value
     *
     * Request options:
     *    $double_1: new random factor
     *
     * Data fields returned on success:
     *   $double_1: the same value provided in the request
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_progression_random_factor_set = 31;

    /**
     * Add all items in a playlist to the play queue
     *
     * Note that if playlist handle does not exist, nothing will happen.
     *
     * Request options:
     *    $string_1: playlist handle
     *
     * Data fields returned on success:
     *   $string_1: the same value provided in the request
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_add_playlist = 140;

    /**
     * Set the play queue to all items in a playlist
     *
     * Note that if playlist handle does not exist, nothing will happen.
     *
     * Request options:
     *    $string_1: playlist handle
     *
     * Data fields returned on success:
     *   $string_1: the same value provided in the request
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_set_to_playlist = 141;

    //---------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------
    //--- P L A Y   Q U E U E   C U R R E N T   I T E M -------------------------------------------
    //---------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------

    /**
     * Get the current FX level value
     * Note that this is unique for each item in the play queue. This gets the value of the currently playing item.
     *
     * Request options:
     *   N/A
     *
     * Data fields returned on success:
     *   $double_1: fx level (factor), default is 1.0
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_current_item_fx_level_get = 50;

    /**
     * Set the current FX level
     *
     * Request options:
     *    $double_1: new fx level (factor)
     *
     * Data fields returned on success:
     *   $double_1: the same value provided in the request
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_current_item_fx_level_set = 51;

    /**
     * Get the current Speed factor
     * Note that this is unique for each item in the play queue.
     * This gets the value of the currently playing item.
     *
     * Request options:
     *   N/A
     *
     * Data fields returned on success:
     *   $double_1: speed (factor), default is 1.0
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_current_item_speed_get = 56;

    /**
     * Set the current Speed factor
     *
     * Request options:
     *    $double_1: new speed (factor)
     *
     * Data fields returned on success:
     *   $double_1: the same value provided in the request
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_current_item_speed_set = 57;

    //---------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------
    //--- P L A Y   Q U E U E   M A N I P U L A T I O N -------------------------------------------
    //---------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------

    /**
     * Get the number of items in the play queue
     *
     * Data fields returned on success:
     *   $integer_1: number of items in the play queue
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_get_number_of_items = 100;

    /**
     * Clear all items from play queue
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_clear = 101;

    /**
     * Shuffle all items in the play queue
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_shuffle = 102;

    /**
     * Add all visuals in a pack to the play queue
     *
     * Request options:
     *   $string_1: pack handle ("classics" for instance)
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_add_pack = 110;

    /**
     * Replace contents of play queue with all visuals in a pack
     *
     * Request options:
     *   $string_1: pack handle ("classics" for example)
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_set_to_pack = 111;

    /**
     * Add a single visual to the play queue
     *
     * Request options:
     *   $string_1: pack handle ("classics" for example)
     *   $string_2: visual handle ("starlight_aurora" for example)
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_add_visual = 120;

    /**
     * Replace contents of play queue with one single visual
     *
     * Request options:
     *   $string_1: pack handle ("classics" for example)
     *   $string_2: visual handle ("starlight_aurora" for example)
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_set_to_visual = 121;

    /**
     * Add a single visual with a specified preset to the play queue
     *
     * Request options:
     *   $string_1: pack handle ("classics" for example)
     *   $string_2: visual handle ("starlight_aurora" for example)
     *   $string_3: preset handle ("default" for example)
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_add_preset = 130;

    /**
     * Replace contents of play queue with one single visual and a specific preset
     *
     * Request options:
     *   $string_1: pack handle ("classics" for example)
     *   $string_2: visual handle ("starlight_aurora" for example)
     *   $string_3: preset handle ("default" for example)
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case play_queue_set_to_preset = 131;

    //---------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------
    //--- M E T A D A T A   I N F O R M A T I O N -------------------------------------------------
    //---------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------

    /**
     * Get the number of available packs
     *
     * Data fields returned on success:
     *   $integer_1: number of available packs
     *
     * Possible errors:
     *   N/A
     */
    case meta_get_number_of_packs = 1000;

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
    case meta_get_pack_info = 1001;

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
    case meta_load_visuals_for_pack = 1002;

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
    case meta_get_number_of_visuals_in_pack = 1010;

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
    case meta_get_visual_info = 1011;


    //---------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------
    //--- P R E S E T  M E T A D A T A ------------------------------------------------------------
    //---------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------

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
    case preset_load_for_pack_and_visual = 1020;

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
    case preset_get_number_of_presets_for_visual = 1021;

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
    case preset_get_preset_handle_by_visual_and_index = 1022;

    /**
     * Send a command to a VZX engine (usually the engine of the currently playing visual)
     * To learn more about what commands are available, check the console in Artiste.
     * Each row in a state file is also a valid engine command.
     * The most common command though is:
     *   param_set_interpolate [module_name] [parameter_name] [value (double)] [adjustment speed factor (double)]
     *
     * Example:
     *  param_set_interpolate float_smoother_1 value_in 0.0 10.0
     *
     * The 4 strings will be concatenated to accommodate longer commands.
     *
     * All values are echoed back the same as they were sent in.
     * If the command does not work, test it in Artiste first. There is no error returns.
     *
     * Request options:
     *   $integer_1: engine index (reserved for future use, should be 0 now)
     *   $string_1: engine command part 1
     *   $string_2: engine command part 2
     *   $string_3: engine command part 3
     *   $string_4: engine command part 4
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case engine_execute_command = 2000;

    /**
     * Get the number of palettes defined in the player
     *
     * Request options:
     *   N/A
     *
     * Data fields returned on success:
     *   $integer_1: the number of palettes 0..n
     *
     * Possible errors:
     *   N/A
     */
    case palette_get_number_of_palettes = 3000;

    /**
     * Get information about a single palette
     *
     * Request options:
     *   $integer_1: palette index (0..total_count-1)
     *
     * Data fields returned on success:
     *   $integer_1: the number of colors defined for the palette
     *   $string_1: the palette's handle
     *   $string_2: the palette's name
     *
     * Possible errors:
     *   error_index_out_of_bounds:
     *     (The requested index out of bounds)
     *     $integer_1: the number of items in the play queue
     *     $string_1: error description
     *     $string_2: error description continued
     */
    case palette_get_palette_info = 3001;

    /**
     * Select the current palette
     *
     * Note that no error message will be sent back.
     * If you supply an invalid handle, check the player logs.
     * (You should have enumerated the available handles already at this stage anyway...)
     *
     * Request options:
     *   $string_1: a valid palette handle or empty string if no palette is to be used
     *
     * Data fields returned on success:
     *   $string_1: same as was sent in
     *
     * Possible errors:
     *   N/A
     */
    case palette_current_palette_set = 3002;

    /**
     * Get information about a single color of a single palette
     *
     * Note that VZX Palette colors are only dealt with in HSV format.
     * If you need other formats you have to convert to / from those yourself.
     *
     * You might think Alpha could be stored in the 4th component, but palette colors
     * do not store alpha.
     *
     * Request options:
     *   $string_1: a valid palette handle
     *   $integer_1: an index from 0..number_of_colors-1
     *
     * Data fields returned on success:
     *   $string_1: color handle
     *   $string_2: color name
     *   $double_1: color H value
     *   $double_2: color S value
     *   $double_3: color V value
     *
     * Possible errors:
     *
     *   error_item_not_found:
     *     (The palette handle can not be found)
     *     $string_1: error description
     *
     *   error_index_out_of_bounds:
     *     (The requested color index is out of bounds)
     *     $integer_1: the number of colors
     *     $string_1: error description
     *     $string_2: error description continued
     */
    case palette_get_color_info = 3003;

    /**
     * Set color for a specific palette
     *
     * Note that this is not saved on the player side, you'd have to save the state
     * to do so.
     *
     * Request options:
     *   $string_1: palette handle
     *   $string_2: color handle
     *   $double_1: color H value
     *   $double_2: color S value
     *   $double_3: color V value
     *
     * Data fields returned on success:
     *   N/A
     *
     * Possible errors:
     *   N/A
     */
    case palette_set_color = 3004;
}

