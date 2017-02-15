<?php
if(!function_exists('wake_up_device')){
    function wake_up_device($mac,$public_ip){
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        $msg = $mac;
        $len = strlen($msg);
        socket_sendto($sock, $msg, $len, 0, $public_ip, 8888);
        socket_close($sock);
    }
}