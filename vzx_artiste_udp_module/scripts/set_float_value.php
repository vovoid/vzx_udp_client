<?php

include(dirname(__FILE__) . '/../vzx/vzx_udp_api.php');

$remote_ip = "127.0.0.1"; // can also be an IP on the LAN, Artiste should listen on all interfaces
$port = 34341; // should be the same as on the module

// The most basic setup, just sets a single value of a single channel.
// Sets channel 1 float value to 1.0
send_float(vzx_udp_channels\channel_1, vzx_udp_operations\set_value_direct,1.0, $remote_ip, $port);
