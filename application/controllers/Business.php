<?php
defined('BASEPATH') OR exit('No direct script access allowed');

final class Business extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Business_model','bm');
    }
    public function index($id){
     if(empty($id)){
         $data=$this->bm->get(null);
         if($data){
             $this->dashboard($data);
         }else{
             show_error("Ninguna empresa encontrada",404);
         }
     }else{
         $data=$this->bm->get($id);
         if($data){
             $this->dashboard($data);
         }else{
             show_error("Ninguna empresa encontrada",404);
         }
     }
    }
    public function register(){
        if($this->input->is_ajax_request()){
            //Le asignamos las reglas de validacion
            $this->form_validation->set_rules("cif","cif","required|min_length[2]|max_length[50]|xss_clean|is_unique[business.cif]");
            $this->form_validation->set_rules("email","email","required|min_length[2]|max_length[100]|xss_clean");
            $this->form_validation->set_rules("password","password","required|min_length[6]|xss_clean|max_length[25]");
            //Le asignamos los mensajes para las reglas
            $this->form_validation->set_message("required","El campo %s es obligatorio");
            $this->form_validation->set_message("is_unique","El cif proporcionado ya esta registrado en nuestro sistema");
            $this->form_validation->set_message("min_length","El campo %s debe tener al menos %s caracteres");
            $this->form_validation->set_message("max_length","El campo %s no debe tener mas de %s caracteres");
            if(!$this->form_validation->run()){
                return json_encode(['status'=>0,'message'=>validation_errors()]);
            }else{
                $post=$this->input->post();
                if($this->bm->insert($post)){
                    echo "Exito";
                }else{
                    echo "Algo fallo al insertar";
                }
            }
        }else{
           redirect(base_url());
        }
    }
    public function detail($id){
        if($this->input->get() && !empty($id)) {
            //Le asignamos las reglas de validacion
            if($data=$this->bm->get($id)){
                $this->load->view('commons/header');
                $this->load->view('business/details',$data);
                $this->load->view('commons/footer');
            }else{
               show_error("No se ha encontrado la empresa solicitada",404);
            }
        }else{
            redirect(base_url());
        }
    }

    public function all_business(){
        if($data=$this->bm->get(null)){
            output_json(["status"=>1,"bussiness"=>$data]);
        }else{
            output_json(["status"=>0,"message"=>"No se ha localizado ninguna empresa"]);
        }
    }

    private function dashboard($data)
    {
        $this->load->view('commons/header');
        $this->load->view('dashboard/business',$data);
        $this->load->view('commons/footer');
    }

}
//End of file applications/controller/Hello.php