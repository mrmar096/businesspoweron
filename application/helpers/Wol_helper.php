<?php



if(!function_exists('wake_up_device')){
    function wake_up_device($mac,$public_ip){
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        $msg = $mac;
        $msg = str_replace(":","",$msg);
        $output = hex2bin($msg);
        $len = strlen($output);
        socket_sendto($sock, $output, $len, 0, $public_ip, 8851);
        socket_close($sock);
    }
}
