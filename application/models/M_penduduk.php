<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_penduduk extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function all()
	{
		return $this->db->get('penduduk');
	}

	public function cek_id($id)
	{
		$this->db->where('nik', $id);
		return $this->db->get('penduduk');
	}

	public function tambah_proses($no_kk, $foto)
	{
		$data = array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jk' => $this->input->post('jk'),
				'pendidikan' => $this->input->post('pendidikan'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'no_kk' => $no_kk,
				'foto' => $foto
			);

		$this->db->insert('penduduk', $data);
	}

	public function edit_proses($id, $foto)
	{
		$data = array(
				'nama' => $this->input->post('nama'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jk' => $this->input->post('jk'),
				'pendidikan' => $this->input->post('pendidikan'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'foto' => $foto
			);

		$this->db->where('nik', $id);
		$this->db->update('penduduk', $data);
	}

	public function tambah_dokumen($id, $nik, $file)
	{
		$data = array(
			'id_dokumen' => $id, 
			'nik' => $nik, 
			'file' => $file, 
			);

		$this->db->insert('dokumen_penduduk', $data);
	}
}

/* End of file M_penduduk.php */
/* Location: ./application/models/M_penduduk.php */