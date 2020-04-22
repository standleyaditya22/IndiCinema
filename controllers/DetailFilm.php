<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailFilm extends CI_Controller {

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
			$this->load->model('M_detailfilm');
			$this->load->model('M_detailStudio');
			$this->load->model('M_detailJadwal');
	}

	public function index()
	{
		
	}
	public function getfilm(){
		$this->load->helper('string');
		$data2['studio']=$this->M_detailStudio->getStudio();
		$data['filmm']=$this->M_detailfilm->getFilm($_GET['id1']);
		$data['studio']=$this->M_detailStudio->getStudio();
		$data['idfilm']= $_GET['id1'];
		$data2['title'] = $_GET['nama'];
		$this->load->view('layout/header.php', $data2);
		$this->load->view('pages/v_detailfilm.php', $data);
	}
	public function getfilm2(){
		$this->load->helper('string');
		$data['filmm']=$this->M_detailfilm->getFilm($_GET['id1']);
		$this->load->view('pages/v_detailfilm2.php', $data);
	}
	public function fetch_studio(){
		$kota = $_GET["kota"];
		$data = $this->M_detailStudio->fetch_studio($kota)->result();
		echo json_encode($data);
	}
	function getTanggal2(){
		$idfilm = $_GET['idfilm'];
		$idstudio = $_GET['idstudio'];
		$data = $this->M_detailJadwal->getTanggal2($idfilm, $idstudio)->result();
		echo json_encode($data);
	}
}
