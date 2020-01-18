<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

	public function login_action(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$check_login_r=$this->Model->getlogin($username,$password)->num_rows();
	 		if ($check_login_r > 0){
	 			$datauser=$this->Model->getlogin($username,$password)->row_array();
				 $level=$datauser['level'];
				 $session=array(
					'id_user'=>$datauser['id_user'],
					'username'=>$datauser['username'],
					'level'=>$datauser['level'],
					'status'=>'ok',	
				);
				$this->session->set_userdata($session);
	 			if ($level== 1) {
	 				redirect('admin');
	 				}
				}else
					{
					 echo "<script>alert('login gagal')</script>";
					 redirect(base_url(''));
					}
		}
					
		public function logout_action(){
			$this->session->sess_destroy();
			redirect(base_url(''));
		}
		
}
