<?php
defined('BASEPATH') OR exit('No direct script access allowed');

final class User_model extends CI_Model
{
    const TABLE="users";

    public function __construct()
    {
        parent::__construct();

    }

    public function get($where=null){
        if(is_null($where)){
            return $this->db->get(self::TABLE)->result();
        }else{

            return $this->db->get_where(self::TABLE,$where)->row();
        }
    }
    public function insert($user){
        return $this->db->insert(self::TABLE,$user);
    }
    public function get_obj($id){
        return $this->db->get_where(self::TABLE,$id)->row();
    }
    public function update($values,$id,$username=null){
        $this->db->set($values);
        if(is_null($username)){
            $this->db->where("id",$id);
        }else{
            $this->db->where("username",$username);
        }
        return $this->db->update(self::TABLE);
    }
    public function delete($id,$username=null){
        if(is_null($username)){
            $this->db->where("id",$id);
        }else{
            $this->db->where("username",$username);
        }
        $this->db->delete(self::TABLE);
        return $this->db->affected_rows()>0;
    }
}
//End of file applications/models/User_model.php