<?php

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

function play_queue_current_item_speed_get() : array|bool
{
    $request = new request();
    $request->action = action_t::play_queue_current_item_speed_get;
    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
        return [$response->double_1, $response->integer_1];
    return FALSE;
}

function play_queue_current_item_speed_set(float $new_speed_factor) : bool
{
    $request = new request();
    $request->action = action_t::play_queue_current_item_speed_set;
    $request->double_1 = $new_speed_factor;
    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
        return TRUE;
    return FALSE;
}
