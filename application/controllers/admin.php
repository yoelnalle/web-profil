<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->ceklogin();
		$this->load->Model('Model','Model');
		$this->load->Model('M_menu');
		$this->load->Model('M_submenu');
		$this->load->library('session');
		$this->load->helper('url');
	}
	private function ceklogin(){
		$id_user=$this->session->userdata('id_user');
		$status=$this->session->userdata('status');
		$level=$this->session->set_userdata('level','1');
		if($id_user == null or $status !='ok'){
			redirect(base_url(''));
		}
	}

	public function index(){
		$jml_kategori	= $this->Model->kat()->num_rows();
		$artikel		=$this->Model->get_art()->num_rows();
		$data['jum_kategori']	=$jml_kategori;
		$data['jum_artikel']	=$artikel;
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/hal_admin',$data);
		$this->load->view('admin/footer');
	}

	public function akun(){
		$data['user'] = $this->Model->get_user()->result();

		$this->load->view('admin/header');
		$this->load->view('admin/user',$data);
		$this->load->view('admin/footer');
	}
	 
	public function tambah_user(){
		$nama		=$this->input->post('nama');
		$username	=$this->input->post('username');
		$password	=sha1($this->input->post('password'));
 		$data=array(
			 'nama'		=>$nama,
			 'username'	=>$username,
			 'password'	=>$password,
 		);
 		$result=$this->Model->save('user',$data);
			if ($result==1) {
				$this->session->set_flashdata('pesan','Data Berhasil Ditambah!');
				redirect('admin/akun');
			}else{
				$this->session->set_flashdata('pesan','Data Gagal Ditambah!');
				redirect('admin/akun');
			}
	}

	public function edit_user($id){
		$data = array(
		 'nama'		=>$this->input->post('nama'),
		 'username'	=>$this->input->post('username'),
		 'password'	=>sha1($this->input->post('password')),
		 );
	   $edit = $this->Model->edit_user($id,$data);
	  if ($edit == 1){
		$this->session->set_flashdata('pesan','Data Berhasil Diubah!');
			  redirect('admin/akun');
	  }else{
		$this->session->set_flashdata('pesan','Data Gagal Diubah!');
			  redirect('admin/akun');
	  	}
 	}

	public function hapus_user($kode=0){
		$result = $this->Model->delete('user', array('id_user'=>$kode));
 		if ($result==1){
			$this->session->set_flashdata('pesan','Data Berhasil Dihapus!');
			 redirect('admin/akun');
 		}else{
			$this->session->set_flashdata('pesan','Data Gagal Dihapus!');
			 redirect('admin/akun'); 		
 		}		
		
	}

	public function publish($id){
		$tgl_publish=date('Y-m-d');
		$data = array(
		'status' => 1,
		'tgl_publikasi'	=>$tgl_publish
		);
		$result = $this->Model->edit_art($id,$data);
 		if ($result){
			 $this->session->set_flashdata('pesan','Data Berhasil Dipublikasikan!');
 			redirect('admin/artikel');
 		}else{
			 echo "<script>alert('') </script>";
			 $this->session->set_flashdata('pesan','Data Gagal Dipublikasikan!');
			 redirect('admin/artikel');	 		
 		}
	 }

	public function draft($id){
		$data = array(
		'status' => 0
		);
		$result = $this->Model->edit_art($id,$data);
 		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Dibuat Draft!');
			 redirect('admin/artikel');
 		}else{
			$this->session->set_flashdata('pesan','Data Gagal Dibuat Draft!');
			 redirect('admin/artikel'); 		
 		}
 	}

	public function kategori($kode=0){
		$users = $this->Model->get_kat(" WHERE id_kategori='$kode'")->row_array();
		$data = array(
			'kategori'		=>$this->Model->get_kat(),
			'id_kategori'	=>$users['id_kategori'],
			'nama'			=>$users['nama'],

			);
		$this->load->view('admin/kategori/kategori',$data);
 	}

	public function hapus_kat($kode=0){
		$result = $this->Model->delete('kategori', array('id_kategori'=>$kode));
 		if ($result==1){
			$this->session->set_flashdata('pesan','Data Berhasil Dihapus!');
			 redirect('admin/kategori');
 		}else{
			$this->session->set_flashdata('pesan','Data Gagal Dihapus!');
			 redirect('admin/kategori'); 		
 		}		
		
	}

	public function tambah_kat(){
		$nama=$this->input->post('nama');
 		$data=array(
 			'nama'=>$nama,
 		);
 		$result=$this->Model->save('kategori',$data);
			if ($result==1) {
				$this->session->set_flashdata('pesan','Data Berhasil Ditambah!');
				redirect('admin/kategori');
			}else{
				$this->session->set_flashdata('pesan','Data Gagal Ditambah!');
				redirect('admin/kategori');
			}
	}

	public function edit($id){
	  	$data = array(
		   'nama'=>$this->input->post('nama'),
	   	);
		 $edit=$this->Model->edit($id,$data);
		if ($edit == 1){
			$this->session->set_flashdata('pesan','Data Berhasil Diubah!');
				redirect('admin/kategori');
		}else{
			$this->session->set_flashdata('pesan','Data Gagal Diubah!');
				redirect('admin/kategori');
		}
	}

	public function artikel(){
		$data = array(
			'artikel'	=>	$this->Model->artikel()->result(),
			);
			$this->load->view('admin/artikel/artikel',$data);
	 }

	public function add_artikel(){
		$data = array(
			'kategori'	=>$this->Model->fetch_kat(),
			'artikel'	=>$this->Model->artikel(),
			);
		$this->load->view('admin/artikel/tambah_art',$data);
	 }
	 
	public function simpan_art(){
		$config['upload_path']		='.\assets\assets2\thumbnail';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']     	= 10000;
		
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto'))
		{
			echo "<script>alert('gagal') </script>";
		}
		else{
				$data 			=$this->upload->data();
				$filename		=$data['file_name'];
				$slug=str_replace(' ','-',$this->input->post('slug'));

				if ($this->input->post('0') !== null ) {
					$status='0';
				}elseif($this->input->post('1')!== null){
					$status='1';
					$tgl_publish=date('Y-m-d');
				}
			
				$data=array(
					'judul'			=>$this->input->post('judul'),
					'slug'			=>$slug,
					'artikel'		=>$this->input->post('artikel'),
					'foto'			=>$filename,
					'id_kategori' 	=>$this->input->post('id_kategori'),
					'tag'			=>$this->input->post('tag'),
					'tanggal'		=>date('Y-m-d'),
					'tgl_publikasi'	=>$tgl_publish,
					'status'		=>$status,
				);
				$result= $this->Model->save('artikel',$data);
				if ($result==1){
					$this->session->set_flashdata('pesan','Data Berhasil Ditambah!');
					redirect('admin/artikel');
				}else{
					$this->session->set_flashdata('pesan','Data Gagal Ditambah!');
					redirect('admin/artikel'); 		
				}	
			}
		}

	public function del_foto($id){
		$data 		= $this->Model->get_where($id)->row();
		$thumbnail	=$data->foto;			
		$path       =APPPATH.'../assets/assets2/thumbnail/'.$thumbnail;
		unlink($path);
		$result = $this->Model->hapus_art($id); 
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Dihapus!');
				redirect('admin/artikel');
			}else{
				$this->session->set_flashdata('pesan','Data Gagal Dihapus!');
				redirect('admin/artikel');		
			}		
		
	}
	public function edit_artikel($id){
		$data = array(
			'kategori'		=>$this->Model->kat()->result(),
			'artikel'		=>$this->Model->get_where($id)->row(),
			);
		$this->load->view('admin/artikel/edit_art',$data);
	}

	public function update_art($id){

		if (!empty($_FILES['foto']['name'])):	
		$config['upload_path']		='.\assets\assets2\thumbnail';
		$config['allowed_types']    = 'gif|jpg|png|jpeg';
		$config['max_size']     	= 10000;
	
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto'))
		{
			echo "<script>alert('gagal') </script>";
		}
		else{
				$thumbnail=$this->input->post('foto_now');
				$path=APPPATH.'../assets/assets2/thumbnail/'.$thumbnail;
				unlink($path);
				$data 			=$this->upload->data();
				$filename		=$data['file_name'];
			}
		endif;	
		$slug=str_replace(' ','-',$this->input->post('slug'));
		if ($this->input->post('0')!== null ) {
			$status='0';
			
		}elseif($this->input->post('1')!== null){
			$status='1';
			$tgl_publish=date('Y-m-d');
		}else{
			$status=$this->input->post('status');
			$tgl_publish=date('Y-m-d');
		}

		if (!empty($_FILES['foto']['name'])) :
			
			$data = array(
				'judul'			=>$this->input->post('judul'),
				'artikel'		=>$this->input->post('artikel'),
				'slug'			=>$slug,
				'foto'			=>$filename,
				'id_kategori' 	=>$this->input->post('id_kategori'),
				'tag'			=>$this->input->post('tag'),
				'status'		=>$status,
				'tgl_publikasi'	=>$tgl_publish	
			
			);
		else:
			$data = array(
				'judul'			=>$this->input->post('judul'),
				'artikel'		=>$this->input->post('artikel'),
				'slug'			=>$slug,					
				'id_kategori' 	=>$this->input->post('id_kategori'),
				'tag'			=>$this->input->post('tag'),
				'status'		=>$status,
				'tgl_publikasi'	=>$tgl_publish
			);
		endif;

		$edit=$this->Model->edit_art($id,$data);
		if ($edit) {
			$this->session->set_flashdata('pesan','Data Berhasil Diubah!');
			redirect('admin/artikel');
		}else{
			$this->session->set_flashdata('pesan','Data Gagal Diubah!');
			redirect('admin/artikel');
		}
	}

	
	public function all_profil(){
		$data = array(
			'profil'	=>	$this->Model->get_profil(),
			);
		$this->load->view('admin/profil/all_profil',$data);
	}

	public function add_all(){
		$data['menu']=$this->Model->get_menu();
		$this->load->view('admin/profil/test',$data);
	}

	public function save_all(){
		$config['upload_path']		='.\assets\assets2\img';
		$config['allowed_types']    = 'gif|jpg|png|jpeg';
		$config['max_size']     	= 10000;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto'))
		{
			echo "<script>alert('gagal') </script>";
		}
		else{
				$data 			=$this->upload->data();
				$filename		=$data['file_name'];
				
				$data=array(
					'judul'			=>$this->input->post('judul'),
					'menu_id'		=>$this->input->post('id_menu'),
					'submenu_id'	=>$this->input->post('id_submenu'),
					'deskripsi'		=>$this->input->post('deskripsi'),
					'foto'			=>$filename,
				);
				$result= $this->Model->save('profil',$data);
				if ($result==1){
					$this->session->set_flashdata('pesan','Data Berhasil Ditambah!');
					redirect('admin/all_profil');

				}else{
					$this->session->set_flashdata('pesan','Data Gagal Ditambah!');
					redirect('admin/add_all');	
				}	
			}
		}
	public function del_profil($id){
		$data = $this->Model->get_profil($id)->row();
		$thumbnail=$data->foto;			
		$path=APPPATH.'../assets/assets2/img/'.$thumbnail;
		unlink($path);
		$result = $this->Model->hapus_profil($id); 
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Dihapus!');
				redirect('admin/all_profil');
			}else{
				$this->session->set_flashdata('pesan','Data Gagal Dihapus!');
				redirect('admin/all_profil'); 		
			}		
	}

	function get_sub_menu(){
		$menu_id = $this->input->post('id',TRUE);
		$data = $this->Model->get_sub_menu($menu_id)->result();
		echo json_encode($data);
	}

	public function get_edit($id){
		$id_profil 			= $this->uri->segment(3);
		$data['id_profil'] 	= $id_profil;
		$data['all']		= $this->Model->get_all($id)->row();
		$data['menu'] 		= $this->Model->get_menu()->result();
		$get_data 			=$this->Model->get_profil_by_id($id_profil);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['sub_menu_id'] = $row['submenu_id'];
		}
		$this->load->view('admin/profil/edit_profil',$data);
	}

	function get_data_edit(){
		$id_profil = $this->input->post('id_profil',TRUE);
		$data = $this->Model->get_profil_by_id($id_profil)->result_array();
		echo json_encode($data);
	}

	public function update_profil($id){

		if (!empty($_FILES['foto']['name'])):	
		$config['upload_path']		='.\assets\assets2\img';
		$config['allowed_types']    = 'gif|jpg|png|jpeg';
		$config['max_size']    		= 10000;
	
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto'))
		{
			echo "<script>alert('gagal') </script>";
		}
		else{
				$thumbnail=$this->input->post('foto_now');
				$path=APPPATH.'../assets/assets2/img/'.$thumbnail;
				unlink($path);
				$data 			=$this->upload->data();
				$filename		=$data['file_name'];
			}
		endif;	

		if (!empty($_FILES['foto']['name'])) :
			
			$data = array(
				'judul'			=>$this->input->post('judul'),
				'deskripsi'		=>$this->input->post('deskripsi'),
				'foto'			=>$filename,
				'menu_id' 		=>$this->input->post('menu'),
				'submenu_id'	=>$this->input->post('submenu'),
			
			);
		else:
			$data = array(
				'judul'			=>$this->input->post('judul'),
				'deskripsi'		=>$this->input->post('deskripsi'),					
				'submenu_id' 	=>$this->input->post('submenu'),
				'menu_id'		=>$this->input->post('menu'),
			);
		endif;

		$edit=$this->Model->edit_profil($id,$data);
		if ($edit) {
			$this->session->set_flashdata('pesan','Data Berhasil Diubah!');
			redirect('admin/all_profil');
		}else{
			$this->session->set_flashdata('pesan','Data Gagal Diubah!');
			redirect('admin/get_edit');
		}
	}

	public function video(){
		$data = array(
			'video'	=>	$this->Model->get_vid()->result(),
			);
			$this->load->view('admin/video/video',$data);
	}

	public function add_vid(){
		$data = array(
			'vidio'	=>$this->Model->get_vid(),
			);
		$this->load->view('admin/video/tambah_vid',$data);
	}

	public function save_vid(){
		$judul=$this->input->post('judul');
		$link=$this->input->post('link');
 		$data=array(
 			'judul'=>$judul,
 			'link'=>$link
 		);
 		$result=$this->Model->save('vidio',$data);
			if ($result==1) {
				$this->session->set_flashdata('pesan','Data Berhasil Ditambah!');
				redirect('admin/video');
			}else{
				$this->session->set_flashdata('pesan','Data Gagal Ditambah!');
				redirect('admin/video');
			}
	}

	public function hapus_vid($kode=0){
		$result = $this->Model->delete('vidio', array('id_vidio'=>$kode));
 		if ($result==1){
			$this->session->set_flashdata('pesan','Data Berhasil Dihapus!');
			 redirect('admin/video');
 		}else{
			$this->session->set_flashdata('pesan','Data Gagal Dihapus!');
			 redirect('admin/video'); 		
 		}		
		
	}

	public function edit_vid($id){
		$data = array(
			'vidio'	=>$this->Model->get_where_vid($id)->row(),
			);
		$this->load->view('admin/video/edit_vidio',$data);
	}

	public function update_vid($id){
	  	$data = array(
		   'judul'=>$this->input->post('judul'),
		   'link'=>$this->input->post('link')
	   	);
		 $edit=$this->Model->edit_vid($id,$data);
		if ($edit == 1){
			$this->session->set_flashdata('pesan','Data Berhasil Diubah!');
				redirect('admin/video');
		}else{
			$this->session->set_flashdata('pesan','Data Gagal Diubah!');
				redirect('admin/video');
		}
	}

	public function galeri(){
		$data = array(
			'galeri'	=>	$this->Model->get_galeri()->result(),
			);
			$this->load->view('admin/header');
			$this->load->view('admin/galeri/galeri',$data);
			$this->load->view('admin/footer');
	}

	public function add_galeri(){
		$data = array(
			'album'		=>$this->Model->fetch_album(),
			'galeri'	=>$this->Model->get_galeri(),
			);
		$this->load->view('admin/header');
		$this->load->view('admin/galeri/add_galeri',$data);
		$this->load->view('admin/footer');
	}

	public function simpan_galeri(){
		$config['upload_path']		='.\assets\assets2\galeri';
		$config['allowed_types']    = 'gif|jpg|png|jpeg';
		$config['max_size']     	= 10000;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto'))
		{
			echo "<script>alert('gagal') </script>";
		}
		else{
			$data 			=$this->upload->data();
			$filename		=$data['file_name'];
			
			$data=array(
				'deskripsi'		=>$this->input->post('deskripsi'),
				'id_album'		=>$this->input->post('album'),
				'foto'			=>$filename,
			);
			$result= $this->Model->save('galeri',$data);
			if ($result==1){
				$this->session->set_flashdata('pesan','Data Berhasil Ditambah!');
				redirect('admin/galeri');

			}else{
				$this->session->set_flashdata('pesan','Data Gagal Ditambah!');
				redirect('admin/add_galeri');	
			}	
		}
	}

	public function edit_galeri($id){
		$data = array(
			'album'			=>$this->Model->get_album()->result(),
			'galeri'		=>$this->Model->get_where_galeri($id)->row(),
			);
		$this->load->view('admin/header');
		$this->load->view('admin/galeri/edit_galeri',$data);
		$this->load->view('admin/footer');
	}

	public function update_galeri($id){

		if (!empty($_FILES['foto']['name'])):	
		$config['upload_path']		='.\assets\assets2\galeri';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']    		= 10000;
	
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto'))
		{
			echo "<script>alert('gagal') </script>";
		}
		else{
				$thumbnail=$this->input->post('foto_now');
				$path=APPPATH.'../assets/assets2/galeri/'.$thumbnail;
				unlink($path);
				$data 			=$this->upload->data();
				$filename		=$data['file_name'];
			}
		endif;	

		if (!empty($_FILES['foto']['name'])) :
			
			$data = array(
				'deskripsi'		=>$this->input->post('deskripsi'),
				'id_album'		=>$this->input->post('album'),
				'foto'			=>$filename,
			);
		else:
			$data = array(
				'deskripsi'		=>$this->input->post('deskripsi'),
				'id_album'		=>$this->input->post('album'),
			);
		endif;

		$edit=$this->Model->edit_galeri($id,$data);
		if ($edit) {
			$this->session->set_flashdata('pesan','Data Berhasil Diubah!');
			redirect('admin/galeri');
		}else{
			$this->session->set_flashdata('pesan','Data Gagal Diubah!');
			redirect('admin/edit_galeri');
		}
	}
	public function del_galeri($id){
		$data = $this->Model->get_where_galeri($id)->row();
		$thumbnail=$data->foto;			
		$path=APPPATH.'../assets/assets2/galeri/'.$thumbnail;
		unlink($path);
		$result = $this->Model->hapus_galeri($id); 
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Dihapus!');
				redirect('admin/galeri');
			}else{
				$this->session->set_flashdata('pesan','Data Gagal Dihapus!');
				redirect('admin/galeri'); 		
			}		
	}

	public function album(){
		$data = array(
			'album'	=>	$this->Model->get_album()->result(),
			);
		
		$this->load->view('admin/header');
		$this->load->view('admin/album/album',$data);
		$this->load->view('admin/footer');
 	}

 	public function add_album(){
		$data = array(
			'album'	=>	$this->Model->get_album()
			);
		
		$this->load->view('admin/header');
		$this->load->view('admin/album/add_album',$data);
		$this->load->view('admin/footer');
	}

	public function simpan_album(){
		$config['upload_path']		='.\assets\assets2\galeri';
		$config['allowed_types']    = 'gif|jpg|png|jpeg';
		$config['max_size']     	= 10000;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')){
			echo "<script>alert('gagal') </script>";
		}else{
			$data 			=$this->upload->data();
			$filename		=$data['file_name'];
			
			$data=array(
				'nama_album'	=>$this->input->post('nama'),
				'foto_album'	=>$filename,
			);
			$result= $this->Model->save('album',$data);
			if ($result==1){
				$this->session->set_flashdata('pesan','Data Berhasil Ditambah!');
				redirect('admin/album');

			}else{
				$this->session->set_flashdata('pesan','Data Gagal Ditambah!');
				redirect('admin/add_album');	
			}	
		}
	}

	public function edit_album($id){
		$data = array(
			'album'		=>$this->Model->get_where_album($id)->row(),
			);
		$this->load->view('admin/header');
		$this->load->view('admin/album/edit_album',$data);
		$this->load->view('admin/footer');
	}

	public function update_album($id){

		if (!empty($_FILES['foto']['name'])):	
		$config['upload_path']		='.\assets\assets2\galeri';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']    		= 10000;
	
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto'))
		{
			echo "<script>alert('gagal') </script>";
		}
		else{
				$thumbnail=$this->input->post('foto_now');
				$path=APPPATH.'../assets/assets2/galeri/'.$thumbnail;
				unlink($path);
				$data 			=$this->upload->data();
				$filename		=$data['file_name'];
			}
		endif;	

		if (!empty($_FILES['foto']['name'])) :			
			$data = array(
				'nama_album'	=>$this->input->post('nama'),
				'foto_album'	=>$filename,
			);
		else:
			$data = array(
				'nama_album' =>$this->input->post('nama'),
				
			);
		endif;

		$edit=$this->Model->edit_album($id,$data);
		if ($edit) {
			$this->session->set_flashdata('pesan','Data Berhasil Diubah!');
			redirect('admin/album');
		}else{
			$this->session->set_flashdata('pesan','Data Gagal Diubah!');
			redirect('admin/edit_album');
		}
	}
	
	public function del_album($id){
		$data = $this->Model->get_where_album($id)->row();
		$thumbnail=$data->foto_album;			
		$path=APPPATH.'../assets/assets2/galeri/'.$thumbnail;
		unlink($path);
		$result = $this->Model->hapus_album($id); 
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Dihapus!');
				redirect('admin/album');
			}else{
				$this->session->set_flashdata('pesan','Data Gagal Dihapus!');
				redirect('admin/album'); 		
			}		
	}
}