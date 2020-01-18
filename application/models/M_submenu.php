<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_submenu extends CI_model
{
    public function get_submenu($id){
        $this->db->where('id_menu', $id);
        $result = $this->db->get('kat_menu')->result(); 
        return $result; 
      }
      function get_sub_menu($id_submenu){
        $query = $this->db->get_where('kat_menu', array('id_submenu' => $id_submenu));
        return $query;
    }
    
}