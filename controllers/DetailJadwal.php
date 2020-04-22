<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailJadwal extends CI_Controller {

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
			$this->load->model('M_detailJadwal');
			$this->load->model('M_detailStudio');
			$this->load->helper('string');
	}

	public function index()
	{
		
	}
	public function getfilm(){
		$postData = $this->input->post();
	    echo $this->M_detailJadwal->getFilm($postData);
	}
	public function getfilm2(){
		$this->load->helper('string');
		$data['filmm']=$this->M_detailfilm->getFilm($_GET['id1']);
		$this->load->view('pages/v_detailfilm2.php', $data);
	}
	public function getTanggal(){
		$data2['studio']=$this->M_detailStudio->getStudio();
		$data['studio']=$this->M_detailStudio->getStudioKota($_GET["nama"]);
		$data['kota']=$_GET["nama"];
		$namateater = $this->input->post('teater');
		$data2['title'] = $_GET["nama"];
		$data['tanggal']=$this->M_detailJadwal->getTanggal($namateater);				
		$this->load->view('layout/header.php', $data2);
		$this->load->view('pages/v_teater1.php', $data);
	}
	public function getAll(){
		$data = $this->M_detailJadwal->fetch_jadwal()->result();
		echo json_encode($data);
	}
}
