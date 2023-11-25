<?php

function send_udp_packet($buffer, $ip, $port)
{
    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    socket_sendto($sock, $buffer, strlen($buffer), 0, strval($ip), intval($port));
    socket_close($sock);
}

