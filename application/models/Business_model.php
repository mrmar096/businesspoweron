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
            return $this->db->get(self::TABLE)->result();
        }else{
            return $this->db->get_where(self::TABLE,$id)->row();
        }
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
