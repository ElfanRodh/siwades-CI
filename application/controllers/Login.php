<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function admin()
	{
		$this->load->view('admin/login_admin');
	}

	public function register()
	{
		$this->load->view('admin/register');
	}

	public function login()
	{
		$u 	= $this->input->post('username');
		$p 	= md5($this->input->post('password'));

		$cek 	= $this->M_login->cek($u, $p)->num_rows();
		$cek2 	= $this->M_login->cek($u, $p)->row_array();

		if ($cek > 0) {
			$this->session->set_userdata('nik', $cek2['nik']);
			$this->session->set_userdata('nama', $cek2['nama']);
			$this->session->set_userdata('pekerjaan', $cek2['pekerjaan']);
			$this->session->set_userdata('no_kk', $cek2['no_kk']);
			$this->session->set_userdata('akses', 'user');
			redirect('home');
		} else {
			$this->session->set_flashdata('gagal_login','1');
			redirect('login','refresh');
		}
	}

	public function login_admin()
	{
		$u 	= $this->input->post('username');
		$p 	= md5($this->input->post('password'));

		$cek 	= $this->M_login->cek_admin($u, $p)->num_rows();
		$cek2 	= $this->M_login->cek_admin($u, $p)->row_array();

		if ($cek > 0) {
			$this->session->set_userdata('nik', $cek2['id_admin']);
			$this->session->set_userdata('nama', $cek2['nama_admin']);
			$this->session->set_userdata('pekerjaan', 'ADMIN');
			$this->session->set_userdata('no_kk', '');
			$this->session->set_userdata('akses', 'admin');
			redirect('home');
		} else {
			$this->session->set_flashdata('gagal_login','1');
			redirect('login/admin','refresh');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nik');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('no_kk');
		$this->session->unset_userdata('pekerjaan');
		$this->session->unset_userdata('akses');

		redirect('login','refresh');
	}

	public function register_proses()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required',
		array(
			'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIK Tidak Boleh Kosong.</div>'
			)
		);
		$this->form_validation->set_rules('username', 'Username', 'trim|required',
		array(
			'required' => '<div class="alert alert-danger"><strong>Error!</strong> Username Tidak Boleh Kosong.</div>'
			)
		);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',
		array(
			'required' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Boleh Kosong.</div>'
			)
		);
		$this->form_validation->set_rules('password2', 'Password', 'trim|matches[password]',
		array(
			'matches' => '<div class="alert alert-danger"><strong>Error!</strong> Konfirmasi Password tidak sama.</div>'
			)
		);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/register');
		}else{
			$nik = $this->input->post('nik');
			$cek = $this->M_login->cek_nik($nik)->num_rows();

			if ($cek > 0) {
				$this->M_login->register_proses($nik);
				$this->session->set_flashdata('sukses_register', '1');
				redirect('login','refresh');
			}else{
				$this->session->set_flashdata('gagal_register', '1');
				redirect('login/register','refresh');
			}
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */