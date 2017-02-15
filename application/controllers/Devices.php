<?php
defined('BASEPATH') OR exit('No direct script access allowed');

final class Devices extends CI_Controller
{
    const OFF=0;
    const ON=1;
    const WOL_SEND=2;


    public function __construct()
    {
        parent::__construct();


    }

    public function wakeup($mac)
    {
        if($this->dm->get_obj(["mac"=>$mac])->status==self::ON){
            //die("hola1");
            output_json(['status'=>0,'Este equipo ya esta despierto']);
        }else if($this->dm->get_obj(["mac"=>$mac])->status==self::OFF){
            $cif=$this->dm->get_obj(["mac"=>$mac])->cif;

            $public_ip=$this->bm->get_obj(["cif"=>$cif])->ip;

            wake_up_device($mac,$public_ip);

            $this->dm->update(['status'=>self::ON,"last_power_on"=>time()],["mac"=>$mac]);

            output_json(['status'=>1,'Se ha enviado la solicitud']);
        }else{
            output_error_json(['status'=>0,'No se ha encontrado el dispositivo'],404);
        }
    }
    public function poweroff($mac)
    {

        if($this->dm->get_obj(["mac"=>$mac])->status==self::OFF){;
            output_json(['status'=>0,'Este equipo ya esta apagado']);
        }else if($this->dm->get_obj(["mac"=>$mac])->status==self::ON){
            $this->dm->update(['status'=>self::OFF],["mac"=>$mac]);
            output_json(['status'=>1,'Se ha enviado la solicitud']);
        }else{
            output_error_json(['status'=>0,'No se ha encontrado el dispositivo'],404);
        }
    }

    public function index(){
        $user=$this->session->userdata("user");
        if($user->type==ADMIN_USER){
            $data=$this->dm->get(null);
            $this->dashboard($data);
        }else{
            $business=$this->bm->get_obj(["user"=>$user->uid]);
            if($business){
                $data=$this->dm->get(["cif"=>$business->cif]);
                $this->dashboard($data);
            }else{
                if($this->input->is_ajax_request()){
                    output_error_json(['status'=>0,'No tienes ninguna empresa registrada']);
                }else{
                    redirect($this->agent->referer);
                }
            }

        }



    }
    public function register(){
        if($this->input->is_ajax_request()){
            $user=$this->session->userdata("user");
            $business=$this->bm->get_obj(["user"=>$user->uid]);
            $cif = $business->cif;
            //Le asignamos las reglas de validacion
            $this->form_validation->set_rules("mac","Direccion Mac","required|min_length[2]|max_length[50]|xss_clean|is_unique[devices.mac]");
            $this->form_validation->set_rules("ip","Direccion IP","required|min_length[7]|max_length[15]|xss_clean|trim");
            $this->form_validation->set_rules("name","Nombre","required|min_length[6]|xss_clean|max_length[25]");
            //Le asignamos los mensajes para las reglas
            $this->form_validation->set_message("required","El campo %s es obligatorio");
            $this->form_validation->set_message("is_unique","Esta direccion mac ya esta registrada");
            $this->form_validation->set_message("min_length","El campo %s debe tener al menos %s caracteres");
            $this->form_validation->set_message("max_length","El campo %s no debe tener mas de %s caracteres");
            if(!$this->form_validation->run()){
                output_json(['status'=>0,'message'=>validation_errors()]);
            }else{
                $post=$this->input->post();
                $post['cif'] = $cif;
                if($this->dm->insert($post)){
                    output_json(['status'=>1,'message'=>'Se ha registrado con exito','url'=>base_url('devices')]);
                }else{
                    output_error_json(['status'=>0,'message'=>"Error interno al insertar"]);
                }
            }
        }else{
            redirect($this->agent->referer);
        }
    }
    public function delete($mac){
        if($this->input->is_ajax_request()){

            if($this->dm->delete(["mac"=>$mac])){
                output_json(['status'=>1,'message'=>"Eliminado con exito"]);
            }else{
                output_error_json(['status'=>0,'message'=>"Ningun elemento ha sido eliminado"],400);
            }
        }else{
            redirect($this->agent->referer);
        }
    }
    public function update($mac){
        if($this->input->is_ajax_request()){
            $data=$this->input->post();
            if($this->dm->update($data,["mac"=>$mac])){
                output_json(['status'=>1,'message'=>"Actualizado con exito"]);
            }else{
                output_error_json(['status'=>0,'message'=>"No se acualizó ningun elemento"],400);
            }
        }else{
            redirect($this->agent->referer);
        }
    }
    private function dashboard($data)
    {
        $this->load->view('commons/header');
        $this->load->view('dashboard/devices',["data"=>$data]);
        $this->load->view('commons/footer');
    }
}
