<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailStudio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('M_detailStudio');
			$this->load->model('M_detailJadwal');
	}

	public function index()
	{
		$this->load->helper('string');
		$data2['studio']=$this->M_detailStudio->getStudio();
		$data['studio']=$this->M_detailStudio->getStudioKota($_GET["nama"]);
		$data['kota']=$_GET["nama"];
		$data2['title'] = $_GET["nama"];

		$this->load->view('layout/header.php', $data2);
		$this->load->view('pages/v_teater.php', $data);
	}
	public function fetch_tanggal(){
		$id = $_GET["idStudio"];
		$data = $this->M_detailJadwal->fetch_tanggal($id)->result();
		echo json_encode($data);
	}
	public function fetch_detail(){
		$idteater = $_GET["idteater"];
		$tanggal = $_GET['tanggal'];
		$data = $this->M_detailJadwal->fetch_detail($idteater, $tanggal)->result();
		echo json_encode($data);
	}
	function fetch_jam(){
		$idjadwal = $_GET["idjadwal"];
		$data = $this->M_detailJadwal->getjam($idjadwal)->result();
		echo json_encode($data);
	}
	public function fetch_detail2(){
		$idjadwal = $_GET["idjadwal"];
		$data = $this->M_detailJadwal->fetch_detail2($idjadwal)->result();
		echo json_encode($data);
	}
}
