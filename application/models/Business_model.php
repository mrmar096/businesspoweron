<?php
defined('BASEPATH') OR exit('No direct script access allowed');

final class Business_model extends CI_Model 
{
    const TABLE = 'business';

    public function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        if(is_null($id)){
            $data= $this->db->get(self::TABLE)->result();
            for($i=0;$i<count($data);$i++){
                $data[$i]->devices=$this->db->get_where('devices',["cif"=>$data[$i]->cif])->num_rows();
            }
            return $data;
        }else{
            $data= $this->db->get_where(self::TABLE,$id)->result();
            $data[0]->devices=$this->db->get_where('devices',["cif"=>$data[0]->cif])->num_rows();
            return $data;
        }
    }
    public function get_obj($id){
        return $this->db->get_where(self::TABLE,$id)->row();
    }
    public function insert($data)
    {
        return $this->db->insert(self::TABLE,$data);
    }
    public function update($data,$where)
    {
        return $this->db->update(self::TABLE,$data,$where);
    }
    public function delete($where)
    {
        $this->db->delete(self::TABLE,$where);
        return $this->db->affected_rows()>0;
    }

}
