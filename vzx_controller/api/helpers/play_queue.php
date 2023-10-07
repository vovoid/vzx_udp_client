<?php

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

function play_queue_add_playlist(string $playlist_handle): bool
{
    $request = new request();
    $request->string_1 = $playlist_handle;
    $request->action = action_t::play_queue_add_playlist;
    $response = vzx_controller_api_call($request);
    return $response instanceof response;
}

function play_queue_set_to_playlist(string $playlist_handle): bool
{
    $request = new request();
    $request->string_1 = $playlist_handle;
    $request->action = action_t::play_queue_set_to_playlist;
    $response = vzx_controller_api_call($request);
    return $response instanceof response;
}


