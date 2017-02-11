<?php
defined('BASEPATH') OR exit('No direct script access allowed');

final class Device extends CI_Controller 
{
    const OFF=0;
    const ON=1;
    const WOL_SEND=2;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Device_model','dm');
    }
    
    public function wakeUp($mac)
    {
        if($this->dm->get($mac)->status==self::ON){
            output_json(['status'=>0,'Este equipo ya esta despierto']);
        }else if($this->dm->get($mac)->status==self::WOL_SEND){

        }else{

        }

    }
}
//End of file applications/controller/Hello.php