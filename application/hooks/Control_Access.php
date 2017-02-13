<?php

/**
 * Created by PhpStorm.
 * User: Mario
 * Date: 11/02/2017
 * Time: 9:27
 */
class Control_Access
{
    private $grant=array("","home","user/login","user/register");


    function __get($name)
    {
        return get_instance()->$name;
    }

    function check_user_logged(){
        $uri=$_SERVER["REQUEST_URI"];
        $peticion=substr($uri,strpos($uri,"/",1)+1);
        if(!in_array($peticion,$this->grant) ){
            if(!$data=$this->session->userdata("user")){
                redirect(base_url('home'));
            }
        }


    }
}