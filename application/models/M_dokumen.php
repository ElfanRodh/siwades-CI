<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dokumen extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function all()
	{
		return $this->db->get('dokumen');
	}

	public function cek_id($id)
	{
		$this->db->where('id_dokumen', $id);
		return $this->db->get('dokumen');
	}

	public function tambah_proses()
	{
		$data = array('nama_dokumen' => $this->input->post('nama_dokumen'));
		$this->db->insert('dokumen', $data);
	}

	public function edit_proses($id)
	{
		$data = array('nama_dokumen' => $this->input->post('nama_dokumen'));
		$this->db->where('id_dokumen', $id);
		$this->db->update('dokumen', $data);
	}

}

/* End of file M_dokumen.php */
/* Location: ./application/models/M_dokumen.php */