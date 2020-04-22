<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detailProgram extends CI_Model 
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
	function getAll(){
		$query = $this->db->query('SELECT * FROM detail_program');
		return $query;
	}
	function getProgram($id){
		$query = $this->db->query("SELECT * FROM detail_program WHERE idprogram = '$id' ");
		return $query;
	}
}