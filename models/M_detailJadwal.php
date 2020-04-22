<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detailJadwal extends CI_Model 
{
		
		/*public function is_user_login_ok($username, $password){
			$query = $this->db->query("SELECT count(*) as ada FROM pengguna WHERE username='$username' AND password='$password'");
			return $query->row_array();
		}*/
	public function getStudio()
	{
		$query = $this->db->query("SELECT * FROM detail_jadwal");
		return $query;
	}
	public function getFilm($idStudio)
	{
		$this->db->where('idtheater', $idStudio);
		$query = $this->db->get('detail_jadwal');
		$output = '<option value="">Select State</option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->idfilm.'">'.$row->judulfilm.'</option>';
		}
		return $output;
	}
	public function getTanggal($namateater)
	{
		$query = $this->db->query("SELECT * FROM detail_jadwal where theater = '$namateater' ");
		return $query;
	}
	public function fetch_jadwal($id)
	{
		$query = $this->db->query("SELECT idfilm, judulfilm, count(theater) FROM detail_jadwal where idtheater = '$id' group by judulfilm ");
		return $query;
	}
	public function fetch_tanggal($id)
	{
		$query = $this->db->query("SELECT COUNT(judulfilm), tanggal FROM detail_jadwal WHERE idtheater = '$id' GROUP BY tanggal");
		return $query;
	}
	public function fetch_detail($idteater, $tanggal)
	{
		$query = $this->db->query("SELECT detail_film.judulfilm, detail_film.usia, detail_film.url, detail_jadwal.idjadwal FROM detail_jadwal INNER JOIN detail_film ON detail_jadwal.idfilm = detail_film.idfilm WHERE detail_jadwal.idtheater='$idteater' and detail_jadwal.tanggal = '$tanggal' ");
		return $query;
	}

	function fetch_jam($idteater,$idfilm){
		$query = $this->db->query("SELECT idjadwal, tanggal, count(judulfilm) FROM detail_jadwal WHERE idfilm = '$idfilm' and idtheater = '$idteater' group by tanggal ");
		return $query;
	}
	function getTanggal2($idfilm, $idstudio){
		$query = $this->db->query("SELECT * FROM detail_jadwal WHERE idfilm = '$idfilm' AND idtheater = '$idstudio' ");
		return $query;
	}
	public function fetch_detail2($idjadwal)
	{
		$query = $this->db->query("SELECT detail_theater.alamat, detail_jadwal.idjadwal, detail_jadwal.idfilm, detail_jadwal.idtheater, detail_jadwal.theater, detail_jadwal.judulfilm, detail_jadwal.tanggal FROM detail_jadwal INNER JOIN detail_theater ON detail_jadwal.idtheater = detail_theater.id_theater WHERE detail_jadwal.idjadwal='$idjadwal'");
		return $query;
	}
	public function getall($idJadwal){
		$query = $this->db->query(" SELECT detail_jadwal.theater, detail_jadwal.tanggal, detail_film.judulfilm, detail_film.url, detail_jadwal.idjadwal, detail_film.durasi FROM detail_jadwal INNER JOIN detail_film ON detail_jadwal.idfilm = detail_film.idfilm WHERE idjadwal = '$idJadwal' ");
		return $query;
	}
	function getjam($idJadwal){
		$query = $this->db->query("SELECT * FROM jamtayang WHERE idJadwal = '$idJadwal' ");
		return $query;
	}
	function getPesan($idJadwal){
		$query = $this->db->query("SELECT detail_jadwal.theater, detail_jadwal.tanggal, detail_film.judulfilm, detail_film.durasi, detail_theater.telepon FROM detail_jadwal INNER JOIN detail_film ON detail_jadwal.idfilm = detail_film.idfilm INNER JOIN detail_theater ON detail_jadwal.idtheater = detail_theater.id_theater WHERE idjadwal = '$idJadwal' ");
		return $query;
	}

}