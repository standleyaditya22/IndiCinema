<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detailfilm extends CI_Model 
{
		
		/*public function is_user_login_ok($username, $password){
			$query = $this->db->query("SELECT count(*) as ada FROM pengguna WHERE username='$username' AND password='$password'");
			return $query->row_array();
		}*/
	public function getSedang()
	{
		$query = $this->db->query('SELECT * FROM detail_film WHERE keterangan = "Sedang Tayang" ORDER BY tanggalTayang DESC');
		return $query;
	}
	public function getNanti()
	{
		$query = $this->db->query('SELECT * FROM detail_film WHERE keterangan = "Akan Tayang" ORDER BY tanggal DESC');
		return $query;
	}
	public function getFilm($id)
	{
		$query = $this->db->query("SELECT * FROM detail_film WHERE idfilm = '$id' ");
		return $query;
	}
	public function fetch_film(){
		
	}
	public function carousel(){
		$this->db->select('*');
		$this->db->from('detail_film');
		$this->db->where('detail_film.status','Tampil');
		$this->db->select('detail_film.judulfilm as nama');
		$this->db->select('detail_film.idfilm as id');
		$this->db->select('detail_film.sinopsis as detail');
		$this->db->select('detail_film.urlbanner as gambar');
		$this->db->select('detail_film.tanggalTayang as tanggal');
		$this->db->order_by('tanggalTayang','asc');
		$data1 = $this->db->get()->result_array();
		$this->db->select('*');
		$this->db->from('detail_program');
		$this->db->where('detail_program.status','Tampil');
		$this->db->select('detail_program.namaprogram as nama');
		$this->db->select('detail_program.idprogram as id');
		$this->db->select('detail_program.deskripsi as detail');
		$this->db->select('detail_program.urlprogram as gambar');
		$this->db->select('detail_program.tanggal as tanggal');
		$this->db->order_by('tanggal','asc');
		$data2 = $this->db->get()->result_array();

		$query = array_merge($data1,$data2);
		$uye=array();
		foreach ($query as $key=>$row){
			$uye[$key] = $row['tanggal'];
		}
		array_multisort($uye,SORT_ASC,$query);
		
		return $query;

	}
}