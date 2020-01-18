<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrator extends CI_Controller {

	public function index($status='1'){
		$this->load->Model('M_dashboard');
		$data['artikel']=$this->M_dashboard->status($status)->result();
		$data['art_kat']=$this->M_dashboard->get_artikel_by_kat('berita',$status)->result();
		$data['art_pub']=$this->M_dashboard->get_artikel_by_kat('informasi publik',$status)->result();
		$data['kategori']=$this->M_dashboard->get_kat()->result();
		$data['vidio']=$this->M_dashboard->get_vidio()->result();
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/beranda',$data);
		$this->load->view('dashboard/footerN');
	}
	
	public function detail($slug){
		$this->load->Model('M_dashboard');
		$data['artikel'] = $this->M_dashboard->get_slug($slug)->row();
		$data['kategori']=$this->M_dashboard->get_kat()->result();

		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/detail',$data);
		$this->load->view('dashboard/footerN');
	}
	 
	 public function profil_so(){
		$this->load->Model('M_dashboard');
		$data['profil']=$this->M_dashboard->get_profil('struktur organisasi')->result();
		$data['kategori']=$this->M_dashboard->get_kat()->result();
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/so',$data);
		$this->load->view('dashboard/footerN');
	}

	public function visi_misi(){
		$this->load->Model('M_dashboard');
		$data['profil']=$this->M_dashboard->get_profil('profil BPTD')->result();
		$data['kategori']=$this->M_dashboard->get_kat()->result();
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/vm',$data);
		$this->load->view('dashboard/footerN');
	}
	
	public function profil_pa(){
		$this->load->Model('M_dashboard');
		$data['profil']=$this->M_dashboard->get_profil('peta administrasi')->result();
		$data['kategori']=$this->M_dashboard->get_kat()->result();
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/pa',$data);
		$this->load->view('dashboard/footerN');
	}
	
	public function profil_pj(){
		$this->load->Model('M_dashboard');
		$data['profil']=$this->M_dashboard->get_profil('perlengkapan jalan')->result();
		$data['kategori']=$this->M_dashboard->get_kat()->result();
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/pj',$data);
		$this->load->view('dashboard/footerN');
	}
	
	public function satpel_bolok(){
		$this->load->Model('M_dashboard');
		$data['profil']=$this->M_dashboard->get_profil('satpel bolok')->result();

		$data['kategori']=$this->M_dashboard->get_kat()->result();
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/bolok',$data);
		$this->load->view('dashboard/footerN');
	}
	
	public function satpel_alor(){
		$this->load->Model('M_dashboard');
		$data['profil']=$this->M_dashboard->get_profil('satpel alor')->result();
		$data['kategori']=$this->M_dashboard->get_kat()->result();
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/alor',$data);
		$this->load->view('dashboard/footerN');
	}
	
	public function satpel_lbj(){
		$this->load->Model('M_dashboard');
		$data['profil']=$this->M_dashboard->get_profil('labuan bajo')->result();
		$data['kategori']=$this->M_dashboard->get_kat()->result();
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/lbj',$data);
		$this->load->view('dashboard/footerN');
	}
	
	public function profil_uppkb(){
		$this->load->Model('M_dashboard');
		$data['profil']=$this->M_dashboard->get_profil('profil uppkb')->result();
		$data['kategori']=$this->M_dashboard->get_kat()->result();
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/uppkb',$data);
		$this->load->view('dashboard/footerN');
	}

	public function pencarian($status='1'){
		$this->load->Model('M_dashboard');
		$cari=$_GET['cari'];
		$data['artikel'] = $this->M_dashboard->get_cari($cari,$status)->result();
		$data['art_pub']=$this->M_dashboard->get_artikel_by_kat('informasi publik',$status)->result();
		$data['kategori']=$this->M_dashboard->get_kat()->result();
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/pencarian',$data);
		$this->load->view('dashboard/footerN');
	}
	
	public function List_kat($nama,$status='1'){
		$this->load->Model('M_dashboard');
		$data['kat'] 		= $this->M_dashboard->get_kat_nama($nama,$status)->result();
		
		$data['art_pub']	=$this->M_dashboard->get_artikel_by_kat('informasi publik',$status)->result();
		
		$data['kategori']	=$this->M_dashboard->get_kat()->result();
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/list_kat',$data);
		$this->load->view('dashboard/footerN');
	}

	public function pelabuhan(){
		$this->load->Model('M_dashboard');
		
		$data['album'] 		= $this->M_dashboard->get_album()->result();
		$data['kategori']	= $this->M_dashboard->get_kat()->result();
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/pelabuhan',$data);
		$this->load->view('dashboard/footerN');
	}
	public function galeri_pel($nama_album){
		$this->load->Model('M_dashboard');
		$data['galeri'] = $this->M_dashboard->get_album_nama($nama_album)->result();
		$data['album'] 		= $this->M_dashboard->get_album()->result();
		$data['kategori']	= $this->M_dashboard->get_kat()->result();
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/galeri',$data);
		$this->load->view('dashboard/footerN');
	}
	
}
