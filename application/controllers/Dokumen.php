<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokumen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dokumen');
		if ($this->session->userdata('nik') == '') {
			redirect('login','refresh');
		}
		
		if ($this->session->userdata('akses') != 'admin') {
			redirect('home','refresh');
		}
	}

	public function index()
	{
		$data['judul']		= 'SIWADES || DOKUMEN';
		$data['aktif'] 		= 'menu';
		$data['aktif2'] 	= 'dokumen';
		$data['konten'] 	= 'admin/dokumen/index.php';
		$data['dokumen']	= $this->M_dokumen->all()->result();
		$this->load->view('template', $data);
	}

	public function tambah_proses()
	{
		$this->form_validation->set_rules('nama_dokumen', 'Nama', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Tidak Boleh Kosong.</div>'
					)
			);
		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['modal_show'] = "$('#modal_large').modal('show');";
			$data['judul']		= 'SIWADES || DOKUMEN';
			$data['aktif'] 		= 'menu';
			$data['aktif2'] 	= 'dokumen';
			$data['konten'] 	= 'admin/dokumen/index.php';
			$data['dokumen']	= $this->M_dokumen->all()->result();
			$this->load->view('template', $data);
		}else{
			$this->M_dokumen->tambah_proses();
			$this->session->set_flashdata('sukses_tambah','1');
			redirect('dokumen','refresh');
		}
	}

	public function edit($id)
	{
		$data['judul']		= 'SIWADES || DOKUMEN || EDIT';
		$data['aktif'] 		= 'menu';
		$data['aktif2'] 	= 'dokumen';
		$data['konten'] 	= 'admin/dokumen/edit.php';
		$data['dokumen']	= $this->M_dokumen->cek_id($id)->row_array();
		$this->load->view('template', $data);
	}

	public function edit_proses($id)
	{
		$this->form_validation->set_rules('nama_dokumen', 'Nama', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Tidak Boleh Kosong.</div>'
					)
			);
		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['judul']		= 'SIWADES || DOKUMEN || EDIT';
			$data['aktif'] 		= 'menu';
			$data['aktif2'] 	= 'dokumen';
			$data['konten'] 	= 'admin/dokumen/edit.php';
			$data['dokumen']	= $this->M_dokumen->cek_id($id)->row_array();
			$this->load->view('template', $data);
		}else{
			$this->M_dokumen->edit_proses($id);
			$this->session->set_flashdata('sukses_edit','1');
			redirect('dokumen','refresh');
		}
	}

	public function hapus($id)
	{
		$this->db->where('id_dokumen', $id);
		$this->db->delete('dokumen');
		$this->session->set_flashdata('sukses_hapus','1');
		redirect('dokumen','refresh');
	}

}

/* End of file Dokumen.php */
/* Location: ./application/controllers/Dokumen.php */