<?php
defined('BASEPATH') OR exit('No direct script access allowed');

final class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
      echo 'hola';
    }
}
//End of file applications/controller/Hello.php