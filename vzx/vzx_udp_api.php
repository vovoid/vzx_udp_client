<?php

include(dirname(__FILE__) . '/vzx_udp_channels.php');
include(dirname(__FILE__) . '/vzx_udp_data_types.php');
include(dirname(__FILE__) . '/vzx_udp_operations.php');

function send_udp_packet($buffer, $ip, $port)
{
    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    socket_sendto($sock, $buffer, strlen($buffer), 0, strval($ip), intval($port));
    socket_close($sock);
}

function send_float(int $channel, float $value, string $ip, int $port)
{
    // Set channel, corresponds to the channel id in the module outputs
    $buffer = pack('L', $channel);

    // next is what operation to request, setting a value direct is the easiest
    $buffer .= pack('L', vzx_udp_operations\set_value_direct);

    // what data type
    $buffer .= pack('L', vzx_udp_data_types\float_type);

    // Next up is the actual value.
    // VZX expects 4 float values.
    // But in this case only the first will be used.
    // add a 32-bit float value
    $buffer .= pack('f', $value); // value
    $buffer .= pack('f', 0.0); // this value will be ignored but must be in the packet
    $buffer .= pack('f', 0.0); // this value will be ignored but must be in the packet
    $buffer .= pack('f', 0.0); // this value will be ignored but must be in the packet

    send_udp_packet($buffer, $ip, $port);
}

function send_float3(int $channel, float $value_x, float $value_y, float $value_z, string $ip, int $port)
{
    // Set channel, corresponds to the channel id in the module outputs
    $buffer = pack('L', $channel);

    // next is what operation to request, setting a value direct is the easiest
    $buffer .= pack('L', vzx_udp_operations\set_value_direct);

    // what data type
    $buffer .= pack('L', vzx_udp_data_types\float3_type);

    // Next up is the actual value.
    // VZX expects 4 float values.
    // But in this case only the first will be used.
    // add a 32-bit float value
    $buffer .= pack('f', $value_x); // value
    $buffer .= pack('f', $value_y); // this value will be ignored but must be in the packet
    $buffer .= pack('f', $value_z); // this value will be ignored but must be in the packet
    $buffer .= pack('f', 0.0); // this value will be ignored but must be in the packet

    send_udp_packet($buffer, $ip, $port);
}

function send_float4(int $channel, float $value_x, float $value_y, float $value_z, float $value_w, string $ip, int $port)
{
    // Set channel, corresponds to the channel id in the module outputs
    $buffer = pack('L', $channel);

    // next is what operation to request, setting a value direct is the easiest
    $buffer .= pack('L', vzx_udp_operations\set_value_direct);

    // what data type
    $buffer .= pack('L', vzx_udp_data_types\float4_type);

    // Next up is the actual value.
    // VZX expects 4 float values.
    // But in this case only the first will be used.
    // add a 32-bit float value
    $buffer .= pack('f', $value_x); // value
    $buffer .= pack('f', $value_y); // this value will be ignored but must be in the packet
    $buffer .= pack('f', $value_z); // this value will be ignored but must be in the packet
    $buffer .= pack('f', $value_w); // this value will be ignored but must be in the packet

    send_udp_packet($buffer, $ip, $port);
}
