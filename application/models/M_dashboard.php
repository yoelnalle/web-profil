<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_model
{
    public function getart($where =''){
    return $this->db->query("SELECT * FROM artikel ".$where);
    }
    public function status($status=''){
        $this->db->select('id_art,judul,artikel,tgl_publikasi,tanggal,foto,nama,tag,slug,status');
        $this->db->join('kategori','artikel.id_kategori = kategori.id_kategori');
        $this->db->from('artikel');
        $this->db->where('status', $status);
        $this->db->order_by('tgl_publikasi','DESC');
        $this->db->limit('2');
		$query = $this->db->get();
		return $query;
    }

    function get_artikel_by_kat($kategori,$status=''){
		$this->db->select('judul,artikel,tanggal,tgl_publikasi,foto,nama,tag,slug');
		$this->db->from('artikel');
        $this->db->join('kategori','artikel.id_kategori = kategori.id_kategori');
        $this->db->where('kategori.nama',$kategori);
        $this->db->where('status', $status);
        $this->db->limit('2');
        $query = $this->db->get();
        
		return $query;
    }
  
    public function get_slug($slug){
        $this->db->select('id_art,judul,artikel,tanggal,foto,nama,tag');
        $this->db->join('kategori','artikel.id_kategori = kategori.id_kategori');
        return $this->db->get_where('artikel',array('slug'=>$slug));
    }
    function get_profil($submenu){
		$this->db->select('id_profil,judul,deskripsi,foto,submenu,menu');
		$this->db->from('profil');
        $this->db->join('menu','menu_id = id_menu','left');
		$this->db->join('kat_menu','submenu_id = id_submenu','left');
        $this->db->where('kat_menu.submenu',$submenu);
        $query = $this->db->get();
		return $query;
    }

    public function get_cari($judul,$status=''){
        $this->db->select('judul,artikel,tanggal,foto,nama,tag,slug,status');
        $this->db->join('kategori','artikel.id_kategori = kategori.id_kategori');
        $this->db->like('judul',$judul);
        $this->db->or_like('artikel',$judul);
        $this->db->where('status', $status);
        return $this->db->get('artikel');
    }

    public function get_kat($where =''){
		return $this->db->query("SELECT * FROM kategori ".$where);
	}

    public function get_kat_nama($nama,$status=''){
        $this->db->select('id_art,nama,judul,artikel,foto,tanggal,tag,slug,status');
        $this->db->from('artikel');
        $this->db->join('kategori','artikel.id_kategori = kategori.id_kategori');
        $this->db->where('kategori.id_kategori',$nama);
        $this->db->where('status', $status);
        $query = $this->db->get();
		return $query;
    }
    
    public function get_album_nama($nama_album){
        $this->db->select('id_galeri,nama_album,foto,deskripsi');
        $this->db->from('galeri');
        $this->db->join('album','galeri.id_album = album.id_album');
        $this->db->where('album.id_album',$nama_album);
        $query = $this->db->get();
		return $query;
    }
    
    public function get_album($where =''){
		return $this->db->query("SELECT * FROM album ".$where);
    }

    public function get_vidio(){
      $this->db->select('judul,link');
      $this->db->from('vidio');
      $this->db->limit('2');
      $query = $this->db->get();      
      return $query;
      }
}