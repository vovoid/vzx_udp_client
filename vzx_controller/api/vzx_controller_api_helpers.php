<?php

include(dirname(__FILE__) . '/vzx_controller_api_call.php');

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
    $request->string_1 = "starlight_aurora";
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

function meta_get_number_of_packs(): int|bool
{
    $request = new request();
    $request->action = action_t::meta_get_number_of_packs;
    $response = vzx_controller_api_call($request);

    if ($response instanceof response)
        return $response->integer_1;

    return FALSE;
}

function meta_get_pack_info(int $pack_index): response|bool
{
    $request = new request();
    $request->action = action_t::meta_get_pack_info;
    $request->integer_1 = $pack_index;

    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
    {
        return $response;
    }

    return FALSE;
}

function meta_load_visuals_for_pack(string $pack_handle): response|bool
{
    $request = new request();
    $request->action = action_t::meta_load_visuals_for_pack;
    $request->string_1 = $pack_handle;

    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
    {
        return $response;
    }

    return FALSE;
}

function meta_get_number_of_visuals_in_pack(string $pack_handle): response|bool
{
    $request = new request();
    $request->action = action_t::meta_get_number_of_visuals_in_pack;
    $request->string_1 = $pack_handle;
    $response = vzx_controller_api_call($request);

    if ($response instanceof response)
        return $response;

    return FALSE;
}

function meta_get_visual_info(string $pack_handle, int $visual_index): response|bool
{
    $request = new request();
    $request->action = action_t::meta_get_visual_info;
    $request->integer_1 = $visual_index;
    $request->string_1 = $pack_handle;

    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
    {
        return $response;
    }

    return FALSE;
}

function preset_load_for_pack(string $pack_handle): response|bool
{
    $request = new request();
    $request->action = action_t::preset_load_for_pack_and_visual;
    $request->string_1 = $pack_handle;

    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
    {
        return $response;
    }

    return FALSE;
}

function preset_load_for_pack_and_visual(string $pack_handle, string $visual_handle): response|bool
{
    $request = new request();
    $request->action = action_t::preset_load_for_pack_and_visual;
    $request->string_1 = $pack_handle;
    $request->string_2 = $visual_handle;

    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
    {
        return $response;
    }

    return FALSE;
}

function preset_get_number_of_presets_for_visual(string $pack_handle, string $visual_handle): int|bool
{
    $request = new request();
    $request->action = action_t::preset_get_number_of_presets_for_visual;
    $request->string_1 = $pack_handle;
    $request->string_2 = $visual_handle;

    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
    {
        return $response->integer_1;
    }

    return FALSE;
}

function preset_get_preset_handle_by_visual_and_index(string $pack_handle, string $visual_handle, int $index): response|bool
{
    $request = new request();
    $request->action = action_t::preset_get_preset_handle_by_visual_and_index;
    $request->string_1 = $pack_handle;
    $request->string_2 = $visual_handle;
    $request->integer_1 = $index;

    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
    {
        return $response;
    }

    return FALSE;

}

