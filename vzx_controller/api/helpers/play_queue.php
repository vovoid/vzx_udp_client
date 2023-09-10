<?php

function play_queue_select_previous_visual(): void
{
    $request = new request();
    $request->action = action_t::play_queue_previous_visual;
    $response = vzx_controller_api_call($request);
    if (!($response instanceof response))
        echo "select_previous_visual failed...\n";
}

function play_queue_select_next_visual(): void
{
    $request = new request();
    $request->action = action_t::play_queue_next_visual;
    $response = vzx_controller_api_call($request);
    if (!($response instanceof response))
        echo "select_next_visual failed...\n";
}

function play_queue_set_current_index(int $index): void
{
    $request = new request();
    $request->action = action_t::play_queue_set_current_index;
    $request->integer_1 = $index;
    $response = vzx_controller_api_call($request);
    if (!($response instanceof response))
        echo "select_next_visual failed...\n";
}

function play_queue_get_current_index(): int|bool
{
    $request = new request();
    $request->action = action_t::play_queue_get_current_index;
    $response = vzx_controller_api_call($request);

    if ($response instanceof response)
        return $response->integer_1;

    return FALSE;
}

function play_queue_get_number_of_items(): int|bool
{
    $request = new request();
    $request->action = action_t::play_queue_get_number_of_items;
    $response = vzx_controller_api_call($request);

    if ($response instanceof response)
        return $response->integer_1;

    return FALSE;
}

function play_queue_clear(): bool
{
    $request = new request();
    $request->action = action_t::play_queue_clear;
    $response = vzx_controller_api_call($request);
    return $response instanceof response;
}

function play_queue_shuffle(): bool
{
    $request = new request();
    $request->action = action_t::play_queue_shuffle;
    $response = vzx_controller_api_call($request);
    return $response instanceof response;
}


function play_queue_set_to_pack(string $pack_handle): bool
{
    $request = new request();
    $request->string_1 = $pack_handle;
    $request->action = action_t::play_queue_set_to_pack;
    $response = vzx_controller_api_call($request);
    return $response instanceof response;
}

function play_queue_add_pack(string $pack_handle): bool
{
    $request = new request();
    $request->string_1 = $pack_handle;
    $request->action = action_t::play_queue_add_pack;
    $response = vzx_controller_api_call($request);
    return $response instanceof response;
}

function play_queue_set_to_visual(string $pack_handle, string $visual_handle): bool
{
    $request = new request();
    $request->string_1 = $pack_handle;
    $request->string_2 = $visual_handle;
    $request->action = action_t::play_queue_set_to_visual;
    $response = vzx_controller_api_call($request);
    return $response instanceof response;
}

function play_queue_add_visual(string $pack_handle, string $visual_handle): bool
{
    $request = new request();
    $request->string_1 = $pack_handle;
    $request->string_2 = $visual_handle;
    $request->action = action_t::play_queue_add_visual;
    $response = vzx_controller_api_call($request);
    return $response instanceof response;
}

function play_queue_set_to_preset(string $pack_handle, string $visual_handle, string $preset_handle): bool
{
    $request = new request();
    $request->string_1 = $pack_handle;
    $request->string_2 = $visual_handle;
    $request->string_3 = $preset_handle;
    $request->action = action_t::play_queue_set_to_preset;
    $response = vzx_controller_api_call($request);
    return $response instanceof response;
}

function play_queue_add_preset(string $pack_handle, string $visual_handle, string $preset_handle): bool
{
    $request = new request();
    $request->string_1 = $pack_handle;
    $request->string_2 = $visual_handle;
    $request->string_3 = $preset_handle;
    $request->action = action_t::play_queue_add_preset;
    $response = vzx_controller_api_call($request);
    return $response instanceof response;
}

function play_queue_base_time_get() : float|bool
{
    $request = new request();
    $request->action = action_t::play_queue_progression_base_time_get;
    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
        return $response->double_1;
    return FALSE;
}

function play_queue_base_time_set(float $new_base_time_in_seconds) : bool
{
    $request = new request();
    $request->action = action_t::play_queue_progression_base_time_set;
    $request->double_1 = $new_base_time_in_seconds;
    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
        return TRUE;
    return FALSE;
}

function play_queue_current_item_fx_level_get() : float|bool
{
    $request = new request();
    $request->action = action_t::play_queue_current_item_fx_level_get;
    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
        return $response->double_1;
    return FALSE;
}

function play_queue_current_item_fx_level_set(float $new_fx_level) : bool
{
    $request = new request();
    $request->action = action_t::play_queue_current_item_fx_level_set;
    $request->double_1 = $new_fx_level;
    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
        return TRUE;
    return FALSE;
}
