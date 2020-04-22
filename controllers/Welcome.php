<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->helper('string');		
		$data['sedang']=$this->M_detailfilm->getSedang();
		$data['nanti']=$this->M_detailfilm->getNanti();
		$data['jadwalStudio']=$this->M_detailJadwal->getStudio();
		$data['studio']=$this->M_detailStudio->getStudio();
		$data['title']="Halaman Utama";
		$data['carousel']=$this->M_detailfilm->carousel();
		$this->load->view('layout/header.php', $data);
		$this->load->view('pages/v_homepage.php', $data);
	}
	function fetch_film()
	 {
	 	
	 }
}
