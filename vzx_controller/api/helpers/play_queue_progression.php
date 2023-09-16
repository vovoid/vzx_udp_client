<?php

function play_queue_progression_select_previous_visual(): void
{
    $request = new request();
    $request->action = action_t::play_queue_progression_previous_visual;
    $response = vzx_controller_api_call($request);
    if (!($response instanceof response))
        echo "select_previous_visual failed...\n";
}

function play_queue_progression_select_next_visual(): void
{
    $request = new request();
    $request->action = action_t::play_queue_progression_next_visual;
    $response = vzx_controller_api_call($request);
    if (!($response instanceof response))
        echo "select_next_visual failed...\n";
}

function play_queue_progression_set_current_index(int $index): void
{
    $request = new request();
    $request->action = action_t::play_queue_progression_set_current_index;
    $request->integer_1 = $index;
    $response = vzx_controller_api_call($request);
    if (!($response instanceof response))
        echo "select_next_visual failed...\n";
}

function play_queue_progression_get_current_index(): int|bool
{
    $request = new request();
    $request->action = action_t::play_queue_progression_get_current_index;
    $response = vzx_controller_api_call($request);

    if ($response instanceof response)
        return $response->integer_1;

    return FALSE;
}

function play_queue_progression_base_time_get() : float|bool
{
    $request = new request();
    $request->action = action_t::play_queue_progression_base_time_get;
    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
        return $response->double_1;
    return FALSE;
}

function play_queue_progression_base_time_set(float $new_base_time_in_seconds) : bool
{
    $request = new request();
    $request->action = action_t::play_queue_progression_base_time_set;
    $request->double_1 = $new_base_time_in_seconds;
    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
        return TRUE;
    return FALSE;
}

function play_queue_progression_random_factor_get() : float|bool
{
    $request = new request();
    $request->action = action_t::play_queue_progression_random_factor_get;
    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
        return $response->double_1;
    return FALSE;
}

function play_queue_progression_random_factor_set(float $new_random_factor) : bool
{
    $request = new request();
    $request->action = action_t::play_queue_progression_random_factor_set;
    $request->double_1 = $new_random_factor;
    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
        return TRUE;
    return FALSE;
}
