<?php

include(dirname(__FILE__) . '/../vzx/vzx_udp_api.php');

$remote_ip = "127.0.0.1"; // can also be an IP on the LAN, Artiste should listen on all interfaces
$port = 34341; // should be the same as on the module

// send a float3 value to channel 2's float3 output
send_float3(vzx_udp_channels\channel_2, vzx_udp_operations\set_value_direct, 1.0, 0.5, 2.0, $remote_ip, $port);
