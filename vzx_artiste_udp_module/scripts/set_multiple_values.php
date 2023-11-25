<?php

include(dirname(__FILE__) . '/../vzx/vzx_udp_api.php');

$remote_ip = "127.0.0.1"; // can also be an IP on the LAN, Artiste should listen on all interfaces
$port = 34341; // should be the same as on the module

// This example sends 3 consecutive UDP packets without any delay thus setting the 3 values immediately.

// send 5.5 to channel 2's float output
send_float(vzx_udp_channels\channel_2, vzx_udp_operations\set_value_direct, 5.5, $remote_ip, $port);

// send a float3 value
send_float3(vzx_udp_channels\channel_2, vzx_udp_operations\set_value_direct, 0.0, 0.0, 0.0, $remote_ip, $port);

// send a float4 value
send_float4(vzx_udp_channels\channel_2, vzx_udp_operations\set_value_direct, 1.0, 1.0, 1.0, 1.0, $remote_ip, $port);
