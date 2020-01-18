<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_model
{
    public function get_menu(){
        return $this->db->get('menu')->result();
      }
     
 
    public function get(){
      $query = $this->db->get('menu');
      foreach ($query->result() as $row)
      {
              echo $row->menu;
      }
    }
    public function get_where($id){  
     	return $this->db->get_where('menu',array('id_menu'=>$id));
	 }
	
}