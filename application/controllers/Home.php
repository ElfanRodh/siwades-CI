<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penduduk');
		$this->load->model('M_kk');
		//Do your magic here
	}

	public function index()
	{
		$data['judul']	= 'SIWADES';
		$data['aktif'] = 'home';
		$data['aktif2'] = 'home';
		$data['allpenduduk'] = $this->M_penduduk->all()->num_rows();
		$data['allkk'] = $this->M_kk->all()->num_rows();
		$data['konten'] = 'admin/dashboard.php';
		$this->load->view('template', $data);
	}


}
