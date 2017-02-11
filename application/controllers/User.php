<?php
defined('BASEPATH') OR exit('No direct script access allowed');

final class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model","um");
    }
    public function index(){
        $this->home();

    }

    public function home(){
        $this->load->view("home");
    }
    public function delete($param)
    {
        if (is_numeric($param)) {

            $this->um->delete($param);
        }else{
            $this->um->delete(null,$param);
        }
    }
    public function login(){
        if($this->input->is_ajax_request()){
            //Le asignamos las reglas de validacion
            $this->form_validation->set_rules("email","email","required|xss_clean");
            $this->form_validation->set_rules("password","password","required|xss_clean");
            //Le asignamos los mensajes para las reglas
            $this->form_validation->set_message("required","El campo %s es obligatorio");
            if(!$this->form_validation->run()){
                    output_json(['status'=>0,'message'=>validation_errors()]);
            }else{
                $post=$this->input->post();
                $email=$post["email"];
                $password=$post["password"];
                $where=array("email"=>$email);
                if($user=$this->um->get($where)){
                   if($this->encryption->decrypt($user->password)==$password){
                      redirect(base_url('user/dashboard'));
                   }
                }else{
                     output_json(['status'=>0,'message'=>'El usuario o la contraseña son incorrectos']);
                }
            }
        }else{
            redirect(base_url());
        }
    }
    public function register(){
        if($this->input->is_ajax_request()){
            //Le asignamos las reglas de validacion
            $this->form_validation->set_rules("name","nombre","required|min_length[2]|max_length[50]|xss_clean");
            $this->form_validation->set_rules("email","email","required|min_length[2]|max_length[100]|xss_clean|is_unique[users.email]");
            $this->form_validation->set_rules("password","password","required|min_length[6]|xss_clean|max_length[25]");
            //Le asignamos los mensajes para las reglas
            $this->form_validation->set_message("required","El campo %s es obligatorio");
            $this->form_validation->set_message("is_unique","La direccion de correo electronico ya esta registrada");
            $this->form_validation->set_message("min_length","El campo %s debe tener al menos %s caracteres");
            $this->form_validation->set_message("max_length","El campo %s no debe tener mas de %s caracteres");
            if(!$this->form_validation->run()){
                output_json(['status'=>0,'message'=>validation_errors()]);
            }else{
                $post=$this->input->post();
                $post['uid']=uniqid('_user_');
                if($this->um->insert($post)){
                    echo "Exito";
                }else{
                    echo "Algo fallo al insertar";
                }
            }
        }else{
            redirect(base_url());
        }
    }
    public function dashboard(){
        $this->load->view('commons/header');
        $this->load->view('commons/footer');

    }


}
