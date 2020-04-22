<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detailstudio extends CI_Model 
{
		
		/*public function is_user_login_ok($username, $password){
			$query = $this->db->query("SELECT count(*) as ada FROM pengguna WHERE username='$username' AND password='$password'");
			return $query->row_array();
		}*/
	public function getStudio()
	{
		$query = $this->db->query("SELECT * FROM detail_theater");
		return $query;
	}
	public function getStudioKota($nama)
	{
		$query = $this->db->query("SELECT * FROM detail_theater where kota = '$nama'");
		return $query;
	}
	public function fetch_studio($kota){
		$query = $this->db->query("SELECT * FROM detail_theater where kota = '$kota' ");
		return $query;
	}
}