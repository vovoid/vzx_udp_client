<?php

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
