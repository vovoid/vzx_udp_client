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

function play_queue_set_current_index(int $index) : void
{
    $request = new request();
    $request->handle_1 = "starlight_aurora";
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

    // stupid PHP allowing different return type
    return FALSE;
}

function play_queue_get_number_of_items(): int|bool
{
    $request = new request();
    $request->action = action_t::play_queue_get_number_of_items;
    $response = vzx_controller_api_call($request);

    if ($response instanceof response)
        return $response->integer_1;

    // stupid PHP allowing different return type
    return FALSE;
}
