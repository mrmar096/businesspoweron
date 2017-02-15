<?php
defined('BASEPATH') OR exit('No direct script access allowed');

final class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    public function index(){
        $this->home();
    }
    public function main(){
        $user=$this->session->userdata("user");
        if($user->type!=ADMIN_USER ){
            $this->business();
        }else{
            $this->all_business();
        }
    }

    public function home(){
        if($user=$this->session->userdata("user")){
            $this->main();
        }else{
            $this->load->view("commons/header");
            $this->load->view("home");
            $this->load->view("commons/footer");
        }
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
                output_error_json(['status'=>0,'message'=>validation_errors()]);
            }else{
                $post=$this->input->post();
                $email=$post["email"];
                $password=$post["password"];
                $where=array("email"=>$email);
                if($user=$this->um->get($where)){
                    if($this->encryption->decrypt($user->password)==$password){
                        $this->session->set_userdata("user",$user);
                        output_json(['status'=>1,'message'=>'Login exitoso','url'=>base_url('main')]);
                    }else{
                        output_error_json(['status'=>0,'message'=>'El usuario o la contraseña son incorrectos'],400);
                    }
                }else{
                    output_error_json(['status'=>0,'message'=>'El usuario o la contraseña son incorrectos'],400);
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
                output_error_json(['status'=>0,'message'=>validation_errors()]);
            }else{
                $post=$this->input->post();
                $post['uid']=uniqid('user_');
                $post['type']=0;
                $password=$post['password'];
                $post['password']=$this->encryption->encrypt($password);
                if($this->um->insert($post)){
                    $user=$this->um->get(["uid"=>$post["uid"]]);
                    $this->session->set_userdata("user",$user);
                    output_json(['status'=>1,'message'=>'Registro exitoso','url'=>base_url('main')]);
                }else{
                    output_json($post);

                    output_error_json(['status'=>0,'message'=>'Error interno al insertar']);
                }
            }
        }else{
            redirect(base_url());
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
    public function update($uid){
        if($this->input->is_ajax_request()){
            $data=$this->input->post();
            if($this->um->update($data,["uid"=>$uid])){
                output_json(['status'=>1,'message'=>"Actualizado con exito"]);
            }else{
                output_json(['status'=>0,'message'=>"No se acualizó ningun elemento"],400);
            }
        }else{
            redirect($this->agent->referer);
        }
    }
    public function business(){
        redirect(base_url('business'));
    }
    public function all_business(){
        redirect(base_url('business/all_business'));
    }





}
