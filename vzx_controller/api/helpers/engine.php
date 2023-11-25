<?php

function engine_execute_command(string $command): int|bool
{
    $request = new request();
    $request->action = action_t::engine_execute_command;
    $request->integer_1 = 0;
    // TODO: split a potentially longer command into the 4 strings here
    // TODO: warn the user if the string is longer than 256 bytes
    $request->string_1 = $command;
    $response = vzx_controller_api_call($request);

    if ($response instanceof response)
        return $response->integer_1;

    return FALSE;
}
