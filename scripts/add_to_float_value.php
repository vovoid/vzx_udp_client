<?php

include(dirname(__FILE__) . '/../vzx/vzx_udp_api.php');

$remote_ip = "127.0.0.1"; // can also be an IP on the LAN, Artiste should listen on all interfaces
$port = 34341; // should be the same as on the module

// Increases channel 1 float value with 0.1 each time this script is run
send_float(vzx_udp_channels\channel_1, vzx_udp_operations\add_to_value,0.1, $remote_ip, $port);
