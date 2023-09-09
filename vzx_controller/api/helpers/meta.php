<?php

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