<?php

include(dirname(__FILE__) . '/vzx_controller_api_call.php');

function get_current_play_queue_index(): int|bool
{
    $req = new request();
    $req->action = action_t::get_current_play_queue_index;
    $response = vzx_controller_api_call($req);

    if ($response instanceof response)
        return $response->result_integer;

    // stupid PHP allowing different return type
    return FALSE;
}
