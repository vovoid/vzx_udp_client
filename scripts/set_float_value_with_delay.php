<?php

include(dirname(__FILE__) . '/../vzx/vzx_udp_api.php');

$remote_ip = "127.0.0.1"; // can also be an IP on the LAN, Artiste should listen on all interfaces
$port = 34341; // should be the same as on the module

// This example is useful to trigger a float_sequence module to animate once.
// Resetting the value to 0.0 ensures that it can be run again later as the module reacts when the value changes from
// 0.0 to larger than 0.0

// set channel 1 float value to 1.0
send_float(vzx_udp_channels\channel_1, 1.0, $remote_ip, $port);

// delay 1 second
echo "Delaying for one second...\n";
sleep(1);

// set channel 1 float value to 0.0
send_float(vzx_udp_channels\channel_1, 0.0, $remote_ip, $port);
