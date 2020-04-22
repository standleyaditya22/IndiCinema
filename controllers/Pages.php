<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

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
			$this->load->helper('form');
			$this->load->helper('string');
			$this->load->model('M_detailJadwal');
			$this->load->model('M_detailStudio');
			$this->load->model('M_detailProgram');
			$this->load->model('M_detailfilm');

	}

	public function nontonYuk(){		
		$data['sedang']=$this->M_detailfilm->getSedang();
		$data['nanti']=$this->M_detailfilm->getNanti();
		$data2['studio']=$this->M_detailStudio->getStudio();
		$data2['title'] = "Nonton Yuk";
		$this->load->view('layout/header.php', $data2);
		$this->load->view('pages/v_nontonyuk.php', $data);
	}
	public function teater(){
		$this->load->view('pages/v_teater.php');
	}
	public function program(){
		$data2['studio']=$this->M_detailStudio->getStudio();
		$data2['title'] = $_GET['nama'];
		$data['program'] = $this->M_detailProgram->getAll();
		$this->load->view('layout/header.php', $data2);
		$this->load->view('pages/v_program.php', $data);
	}
	public function tentang(){
		$data2['studio']=$this->M_detailStudio->getStudio();
		$data2['title'] = "TENTANG INDICINEMA";
		$this->load->view('layout/header.php', $data2);
		$this->load->view('pages/v_tentang.php');
	}
	public function fetch_film(){
		$id = $_GET["idStudio"];
		$data = $this->M_detailJadwal->fetch_jadwal($id)->result();
		echo json_encode($data);
	}
	public function fetch_jam(){
		$idteater = $_GET["idteater"];
		$idfilm = $_GET["idfilm"];
		$data = $this->M_detailJadwal->fetch_jam($idteater,$idfilm)->result();
		echo json_encode($data);
	}
	public function pesan(){
		$idJadwal = $this->input->post('tanggal');
		$data['tod'] = $this->M_detailJadwal->getall($idJadwal);
		$data['jam'] = $this->M_detailJadwal->getjam($idJadwal);
		$data2['studio']=$this->M_detailStudio->getStudio();
		$data2['title'] = "CHECKOUT";
		$this->load->view('layout/header.php', $data2);
		$this->load->view('pages/v_pesanan.php', $data);
	}
	public function pesanan(){
		$id = $_GET["idJadwal"];
		$data = $this->M_detailJadwal->getPesan($id)->result();
		echo json_encode($data);
	}
}