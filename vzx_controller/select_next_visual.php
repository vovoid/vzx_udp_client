<?php

include(dirname(__FILE__) . '/../vzx/vzx_udp_api.php');

$remote_ip = "127.0.0.1"; // can also be an IP on the LAN, VZX Controller should listen on all interfaces
$port = 44100;

enum action_t: int
{
    // fallback, in case someone forgets to set the command
    case undefined = 0;

    // play queue operations
    case previous_visual = 1;
    case next_visual = 2;
}

class request
{
    // this is an uint32_t (little endian)
    public action_t $action = action_t::undefined;

    /**
     * PHP's idea of a binary chunk of data is a string, not perfect but will have to do.
     * @return string
     */
    public function serialize_binary(): string
    {
        $buffer = pack('L', $this->action->value);
        if (is_bool($buffer))
        {
            echo "pack() command failed, returning...";
            return '';
        }

        return $buffer;
    }
}

enum result_t: int
{
    case undefined = 0;
    case error_controller_not_connected_to_player = 1;
    case success = 1000;
}

class response
{
    // this is an uint32_t (little endian)
    public result_t $result = result_t::undefined;

    public function __construct(string $data)
    {
        $this->deserialize_binary($data);
    }

    public function deserialize_binary($data): void
    {
        $unpack_result = unpack('L', $data, 0);
        if (is_bool($unpack_result)) {
            echo "unpack() call failed, returning";
            return;
        }

        $this->result = result_t::from($unpack_result[1]);
    }
}

$req = new request();
$req->action = action_t::next_visual;

// send the request
$socket = send_tcp_packet($req->serialize_binary(), $remote_ip, $port);

// receive response
$recv_status = socket_recv($socket, $reply_data, 4, 0);
if ($recv_status === FALSE) {
    echo "recv call failed\n\n";
    return;
}

$response = new response($reply_data);
if ($response->result == result_t::error_controller_not_connected_to_player)
{
    echo "VZX Controller got our request but could not do anything with it as it was not connected to the player.";
    return;
}

// close socket
socket_close($socket);