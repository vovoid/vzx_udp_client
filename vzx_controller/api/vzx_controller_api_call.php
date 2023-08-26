<?php

include(dirname(__FILE__) . '/../vzx_controller_api_configuration.php');
include(dirname(__FILE__) . '/vzx_controller_request.php');
include(dirname(__FILE__) . '/vzx_controller_response.php');

global $debug_output;
$debug_output = FALSE;

function vzx_controller_api_call(request $request)
{
    global $remote_ip;
    global $port;
    global $debug_output;

    // connect socket to server
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if ($debug_output)
        echo "Connecting to server...";
    if (!socket_connect($socket, $remote_ip, $port)) {
        echo "Could not connect to server: " . $remote_ip . ":" . $port . "\n";
        return null;
    }
    if ($debug_output)
        echo "OK\n";

    // send the request
    if ($debug_output)
        echo "Serializing binary message...";
    $buffer = $request->serialize_binary();
    if ($debug_output)
        echo "OK\n";

    if ($debug_output)
        echo "Sending buffer on socket...";

    $data_sent = socket_send($socket, $buffer, strlen($buffer), 0);
    if ($data_sent === false) {
        echo "No data sent on socket.";
    }
    if ($debug_output)
        echo "OK, " . $data_sent . " bytes was sent\n";

    // receive response
    if ($debug_output)
        echo "Receiving reply from server...";
    $recv_status = socket_recv($socket, $reply_data, response::size_bytes, 0);
    if ($debug_output)
        echo "OK\n";
    if ($recv_status === FALSE) {
        echo "recv call failed\n\n";
        return null;
    }

    // close socket
    if ($debug_output)
        echo "Closing socket...";
    socket_close($socket);

    if ($debug_output)
        echo "OK\n";

    // return response
    $response = new response($reply_data);

    if ($response->result == result_t::error_controller_not_connected_to_player) {
        echo "VZX Controller got our request but could not do anything with it as it was not connected to the player.\n";
        return null;
    }

    if ($response->action != $request->action) {
        echo "Action returned from server does not match...\n";
        return null;
    }

    if ($response->result == result_t::unknown_command) {
        echo "VZX Controller got our request but could not do anything with it as it did not recognize the command (\"unknown command\" returned).\n";
        return null;
    }

    return $response;
}