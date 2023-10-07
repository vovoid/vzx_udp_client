<?php

include(dirname(__FILE__) . '/../vzx_controller_api_configuration.php');
include(dirname(__FILE__) . '/vzx_controller_request.php');
include(dirname(__FILE__) . '/vzx_controller_response.php');

global $enable_debug_output;
$enable_debug_output = FALSE;

function vzx_controller_api_call(request $request): ?response
{
    global $remote_ip;
    global $port;
    global $enable_debug_output;

    // connect socket to server
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if ($enable_debug_output)
        echo "Connecting to server...";
    if (!socket_connect($socket, $remote_ip, $port)) {
        echo "Could not connect to server: " . $remote_ip . ":" . $port . "\n";
        return null;
    }
    if ($enable_debug_output)
        echo "OK\n";

    $buffer = pack("L", request::request_size_in_bytes);

    if ($enable_debug_output)
        echo "buffer length: ". strlen($buffer)."\n";

    $data_sent = socket_send($socket, $buffer, strlen($buffer), 0);
    if ($data_sent != strlen($buffer))
    {
        echo "Could not send message size, try again later.\n";
        return NULL;
    }
    if ($enable_debug_output)
        echo "Sent ".strlen($buffer)." bytes with message length of ".request::request_size_in_bytes." bytes...\n";


    // send the request
    if ($enable_debug_output)
        echo "Serializing binary message...";
    $buffer = $request->serialize_binary();
    if ($enable_debug_output)
        echo "OK\n";

    if ($enable_debug_output)
        echo "Sending buffer on socket...";

    $data_sent = socket_send($socket, $buffer, strlen($buffer), 0);
    if ($data_sent === false) {
        echo "No data sent on socket.";
    }
    if ($enable_debug_output)
        echo "OK, " . $data_sent . " bytes was sent\n";

    // receive response
    if ($enable_debug_output)
        echo "Receiving reply from server...";

    // first receive 4 bytes - size of packet (uint32_t)
    $recv_status = socket_recv($socket, $size_data, 4, 0);
    if ($recv_status === FALSE) {
        echo "recv call failed\n\n";
        return null;
    }

    // size of packet - bytes 0..3
    {
        $unpack_action = unpack('L', $size_data, 0);
        if (is_bool($unpack_action)) {
            die("unpack() call failed for packet length");
        }
        $size_in_bytes = intval($unpack_action[1]);
        if ($size_in_bytes != response::size_bytes)
            die("Size in bytes of packet differs.");
        else
            if ($enable_debug_output)
                echo "Got expected packet size: ".$size_in_bytes."...\n";
    }

    $recv_status = socket_recv($socket, $reply_data, response::size_bytes, 0);
    if ($enable_debug_output)
        echo "OK\n";
    if ($recv_status === FALSE) {
        echo "recv call failed\n\n";
        return null;
    }

    // close socket
    if ($enable_debug_output)
        echo "Closing socket...";
    socket_close($socket);

    if ($enable_debug_output)
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