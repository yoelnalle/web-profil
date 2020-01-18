<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model extends CI_model
{
	
	public function save ($tabel,$data){
		return $this->db->insert($tabel,$data);
	}	
	public function delete($tabel,$where)
	{
		return $this->db->delete($tabel, $where);
	}
	public function getart($where =''){
		return $this->db->query("SELECT * FROM artikel ".$where);
	}
	public function get_user(){
		return $this->db->get('user');
	}

	public function getlogin($username,$password){
        $data = array(
            'username' => $username,
            'password' => sha1($password), 
        );
        return $this->db->get_where('user',$data);
    }

	public function get_kat($where =''){
		return $this->db->query("SELECT * FROM kategori ".$where);
	}

	public function kat(){
		return $this->db->get('kategori');
	}
	public function get_art(){
		return $this->db->get('artikel');
	}

	public function edit($id,$data){
		$this->db->where('id_kategori',$id);
		return $this->db->update('kategori',$data);
	}
	public function edit_user($id,$data){
		$this->db->where('id_user',$id);
		return $this->db->update('user',$data);
	}


	public function artikel(){
     	$this->db->order_by('id_art','tanggal','status','judul','artikel','nama','tag','foto','slug','tgl_publikasi');
        $this->db->join('kategori','artikel.id_kategori = kategori.id_kategori');
		$query= $this->db->get('artikel');	
		return $query;
	 }


	public function fetch_kat(){  
     	$this->db->order_by('nama');
     	$query=$this->db->get('kategori');
     	return $query->result();
	 }

	public function get_where($id){  
     	return $this->db->get_where('artikel',array('id_art'=>$id));
	 }
	 
	public function hapus_art($id){  
		 $this->db->where('id_art',$id);
		return $this->db->delete('artikel');
	}

	public function edit_art($id,$data){
		$this->db->where('id_art',$id);
		return $this->db->update('artikel',$data);
	}

	public function del_art($id_art, $foto){
        $this->db->where('id_art', $id_art);

        unlink(APPPATH.'\thumbnail' .$foto);

        $this->db->delete('artikel', array('id_art' => $id_art));
	}
		
	public function art_kat(){
		$this->db->order_by('judul','artikel','nama','tanggal','foto','status','tag','slug');
		$this->db->join('kategori','artikel.id_kategori = kategori.id_kategori');
		$this->db->limit('2');
		$query= $this->db->get('artikel');
		return $query;
	}
	
	public function art_publish(){
     	 $this->db->order_by('judul','artikel','nama','tanggal','status','foto','tag','slug');
         $this->db->join('kategori', 'artikel.id_kategori = kategori.id_kategori');
		 $this->db->where('status');
		 $query= $this->db->get('artikel');
         return $query;
	}

	public function detail($id){
		 $this->db->order_by('judul','artikel','tanggal','foto','slug');
		return $this->db->get_where('artikel',array('id_art'=>$id));
	}

	function get_profil(){
		$this->db->select('id_profil,judul,deskripsi,menu,submenu,foto');
		$this->db->from('profil');
		$this->db->join('menu','menu_id = id_menu','left');
		$this->db->join('kat_menu','submenu_id = id_submenu','left');	
		$query = $this->db->get();
		return $query;
	}

	public function get_all($id){  
     	return $this->db->get_where('profil',array('id_profil'=>$id));
	}
	

	function get_menu(){
		$query = $this->db->get('menu');
		return $query;	
	}

	function get_sub_menu($menu_id){
		$query = $this->db->get_where('kat_menu', array('id_menu' => $menu_id));
		return $query;
	}

	function get_profil_by_id($id_profil){
		$query = $this->db->get_where('profil', array('id_profil' =>  $id_profil));
		return $query;
	}

    public function get_submenu($id){
		$this->db->from('kat_menu'); 
		$this->db->where('id_menu', $id);
     	$query=$this->db->get();
		 return $query;
	}
	public function hapus_profil($id){  
			$this->db->where('id_profil',$id);
		    return $this->db->delete('profil');
	}

	public function edit_profil($id,$data){
		$this->db->where('id_profil',$id);
		return $this->db->update('profil',$data);
	}
	public function get_vid(){
		return $this->db->get('vidio');
	}
	public function edit_vid($id,$data){
		$this->db->where('id_vidio',$id);
		return $this->db->update('vidio',$data);
	}
	public function get_where_vid($id){  
     	return $this->db->get_where('vidio',array('id_vidio'=>$id));
	}

	public function fetch_album(){  
     	$this->db->order_by('nama_album');
     	$query=$this->db->get('album');
     	return $query->result();
	}
	
	public function get_galeri(){
     	$this->db->order_by('id_galeri','foto','deskripsi','nama_album');
        $this->db->join('album','galeri.id_album = album.id_album');
		$query= $this->db->get('galeri');	
		return $query;
	}
	
	public function get_album(){
		return $this->db->get('album');
	}
	
	public function get_where_galeri($id){  
     	return $this->db->get_where('galeri',array('id_galeri'=>$id));
	}
	
	public function edit_galeri($id,$data){
		$this->db->where('id_galeri',$id);
		return $this->db->update('galeri',$data);
	}
	
	public function hapus_galeri($id){  
			$this->db->where('id_galeri',$id);
		    return $this->db->delete('galeri');
	}

	public function edit_album($id,$data){
		$this->db->where('id_album',$id);
		return $this->db->update('album',$data);
	}
	
	public function get_where_album($id){  
		return $this->db->get_where('album',array('id_album'=>$id));
	}
	
	public function hapus_album($id){  
		$this->db->where('id_album',$id);
		return $this->db->delete('album');
	}
}
?>