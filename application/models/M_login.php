<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek($u, $p)
	{
		return $this->db->query("SELECT * FROM penduduk 
								WHERE username='$u' 
								AND password='$p'");
	}

	public function cek_admin($u, $p)
	{
		return $this->db->query("SELECT * FROM admin 
								WHERE username='$u' 
								AND password='$p'");
	}

	public function cek_nik($nik)
	{
		$this->db->where('nik', $nik);
		return $this->db->get('penduduk');
	}

	public function register_proses($nik)
	{
		$data = array(
			'username' => $this->input->post('username'), 
			'password' => md5($this->input->post('password')), 
			);

		$this->db->where('nik', $nik);
		$this->db->update('penduduk', $data);
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */