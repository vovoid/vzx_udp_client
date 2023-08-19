<?php

function send_udp_packet($buffer, $ip, $port)
{
    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    socket_sendto($sock, $buffer, strlen($buffer), 0, strval($ip), intval($port));
    socket_close($sock);
}

function send_tcp_packet($buffer, $ip, $port)
{
    $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    socket_connect($sock, $ip, $port);
    socket_send($sock, $buffer, strlen($buffer), 0);
    return $sock;
}
