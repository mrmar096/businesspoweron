<?php
defined('BASEPATH') OR exit('No direct script access allowed');

final class Business extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $user=$this->session->userdata("user");
        $data=$this->bm->get(["user"=>$user->uid]);
        $this->dashboard($data);
    }

    public function all_business(){

        if($this->session->userdata("user")->type==ADMIN_USER){
            $data=$this->bm->get(null);
            $this->dashboard($data);
        }else{
            redirect($this->agent->referer);
        }
    }

    public function register(){
        if($this->input->is_ajax_request()){
            //Le asignamos las reglas de validacion
            $this->form_validation->set_rules("cif","cif","required|min_length[2]|max_length[50]|xss_clean|is_unique[business.cif]");
            $this->form_validation->set_rules("name","name","min_length[2]|max_length[100]|xss_clean");
            $this->form_validation->set_rules("ip","ip","min_length[2]|max_length[20]|xss_clean");
            //Le asignamos los mensajes para las reglas
            $this->form_validation->set_message("required","El campo %s es obligatorio");
            $this->form_validation->set_message("is_unique","El cif proporcionado ya esta registrado en nuestro sistema");
            $this->form_validation->set_message("min_length","El campo %s debe tener al menos %s caracteres");
            $this->form_validation->set_message("max_length","El campo %s no debe tener mas de %s caracteres");
            if(!$this->form_validation->run()){
                output_json(['status'=>0,'message'=>validation_errors()]);
            }else{
                $post=$this->input->post();
                $post["user"]=$this->session->userdata("user")->uid;
                if($this->bm->insert($post)){
                    $business=$this->bm->get(['cif'=>$post['cif']]);
                    output_json(['status'=>1,'message'=>'Se ha registrado con exito',"url"=>base_url('business')]);
                }else{
                    output_error_json(['status'=>0,'message'=>'Error interno al insertar'],400);
                }
            }
        }else{
            redirect($this->agent->referer);
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
            redirect($this->agent->referer);
        }
    }
    public function update($cif){
        if($this->input->is_ajax_request()){
            $data=$this->input->post();
            if($this->bm->update($data,["cif"=>$cif])){
                output_json(['status'=>1,'message'=>"Actualizado con exito", "url"=>base_url('business')]);
            }else{
                output_error_json(['status'=>0,'message'=>"No se acualizó ningun elemento"],400);
            }
        }else{
            redirect($this->agent->referer);
        }
    }
    public function delete($cif=null){
        if($this->input->is_ajax_request()){
            if(is_null($cif)&& $this->session->userdata("user")->type==ADMIN_USER){
                if($this->bm->delete()){
                    output_json(['status'=>1,'message'=>"Se eliminaron todas las con exito"]);
                }else{
                    output_error_json(['status'=>0,'message'=>"Ningun elemento ha sido eliminado"],400);
                }
            }else if(!is_null($cif)){
                if($this->bm->delete(["cif"=>$cif])){
                    output_json(['status'=>1,'message'=>"Eliminado con exito"]);
                }else{
                    output_error_json(['status'=>0,'message'=>"Ningun elemento ha sido eliminado"],400);
                }
            }else{
                output_error_json(['status'=>0,'message'=>"No estas autorizado"],401);
            }
        }else{
            redirect($this->agent->referer);
        }
    }

    private function dashboard($data)
    {
        $this->load->view('commons/header');
        $this->load->view('dashboard/business',["data"=>$data]);
        $this->load->view('commons/footer');
    }

}
//End of file applications/controller/Hello.php