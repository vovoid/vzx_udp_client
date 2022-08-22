<?php

include(dirname(__FILE__) . '/../vzx/vzx_udp_api.php');

$remote_ip = "127.0.0.1"; // can also be an IP on the LAN, Artiste should listen on all interfaces
$port = 34341; // should be the same as on the module

// send a float4 value to channel 4's float4 output value
send_float4(vzx_udp_channels\channel_4, vzx_udp_operations\set_value_direct, 1.0, 1.0, 1.0, 1.0, $remote_ip, $port);
