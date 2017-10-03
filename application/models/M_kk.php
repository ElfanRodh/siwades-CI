<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kk extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function all()
	{
		return $this->db->get('kk');
	}

	public function all_p()
	{
		return $this->db->query("SELECT * FROM kk, penduduk WHERE kk.no_kk = penduduk.no_kk");
	}

	public function cek_id($id)
	{
		$this->db->where('no_kk', $id);
		return $this->db->get('kk');
	}

	public function cek_id_p($id)
	{
		$this->db->where('no_kk', $id);
		return $this->db->get('penduduk');
	}

	public function tambah_proses()
	{
		$data = array(
			'no_kk' => $this->input->post('no_kk'), 
			'alamat' => $this->input->post('alamat'), 
			'rt' => $this->input->post('rt'), 
			'rw' => $this->input->post('rw'), 
			'desa' => $this->input->post('desa'), 
			'kecamatan' => $this->input->post('kecamatan'), 
			'kabupaten' => $this->input->post('kabupaten'), 
			'kode_pos' => $this->input->post('kode_pos'), 
			'provinsi' => $this->input->post('provinsi') 
			);

		$this->db->insert('kk', $data);
	}

	public function edit_proses($no_kk)
	{
		$data = array( 
			'alamat' => $this->input->post('alamat'), 
			'rt' => $this->input->post('rt'), 
			'rw' => $this->input->post('rw'), 
			'desa' => $this->input->post('desa'), 
			'kecamatan' => $this->input->post('kecamatan'), 
			'kabupaten' => $this->input->post('kabupaten'), 
			'kode_pos' => $this->input->post('kode_pos'), 
			'provinsi' => $this->input->post('provinsi') 
			);

		$this->db->where('no_kk', $no_kk);
		$this->db->update('kk', $data);
	}

}

/* End of file M_kk */
/* Location: ./application/models/M_kk */