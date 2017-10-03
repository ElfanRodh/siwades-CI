<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kk');
		if ($this->session->userdata('nik') == '') {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		if ($this->session->userdata('akses') != 'admin') {
			redirect('home','refresh');
		}

		$data['judul']		= 'SIWADES || KK';
		$data['aktif'] 		= 'menu';
		$data['aktif2'] 	= 'kk';
		$data['konten'] 	= 'admin/kk/index.php';
		$data['kk']	= $this->M_kk->all()->result();
		$data['kel']	= $this->M_kk->all_p()->row_array();
		$this->load->view('template', $data);
	}

	public function detail($id)
	{
		$data['judul']		= 'SIWADES || KK || DETAIL';
		$data['aktif'] 		= 'menu';
		$data['aktif2'] 	= 'kk';
		$data['konten'] 	= 'admin/kk/detail.php';
		$data['penduduk']	= $this->M_kk->cek_id_p($id)->result();
		$data['kk']			= $this->M_kk->cek_id($id)->row_array();
		$this->load->view('template', $data);
	}

	public function edit($id)
	{
		$data['judul']		= 'SIWADES || KK || EDIT';
		$data['aktif'] 		= 'menu';
		$data['aktif2'] 	= 'kk';
		$data['konten'] 	= 'admin/kk/edit.php';
		$data['kk']			= $this->M_kk->cek_id($id)->row_array();
		$this->load->view('template', $data);
	}

	public function jadi($no_kk, $nik)
	{
		$no_kk = $this->uri->segment(3);
		$nik = $this->uri->segment(4);

		$data = array(
			'kepala_keluarga' => $nik)
		;

		$this->db->where('no_kk', $no_kk);
		$this->db->update('kk', $data);
		$this->session->set_flashdata('sukses_jadi');
		redirect('kk/detail/'.$no_kk);
	}

	public function tambah_proses()
	{
		$this->form_validation->set_rules('no_kk', 'No. KK', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> No. KK Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alamat Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('rt', 'RT', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> RW Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('rw', 'RW', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> RW Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('desa', 'Desa', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Desa Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kecamatan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kabupaten Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kode Pos Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Provinsi Tidak Boleh Kosong.</div>'
					)
			);

				//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['modal_show'] = "$('#modal_large').modal('show');";
			$data['judul']		= 'SIWADES || KK';
			$data['aktif'] 		= 'menu';
			$data['aktif2'] 	= 'kk';
			$data['konten'] 	= 'admin/kk/index.php';
			$data['kk']	= $this->M_kk->all()->result();
			$this->load->view('template', $data);
		}else{
			$this->M_kk->tambah_proses();
			$this->session->set_flashdata('sukses_tambah','1');
			redirect('kk','refresh');
		}
	}

	public function edit_proses($no_kk)
	{
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alamat Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('rt', 'RT', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> RW Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('rw', 'RW', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> RW Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('desa', 'Desa', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Desa Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kecamatan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kabupaten Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Kode Pos Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Provinsi Tidak Boleh Kosong.</div>'
					)
			);

				//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['modal_show'] = "$('#modal_large').modal('show');";
			$data['judul']		= 'SIWADES || KK || EDIT';
			$data['aktif'] 		= 'menu';
			$data['aktif2'] 	= 'kk';
			$data['konten'] 	= 'admin/kk/edit.php';
			$data['kk']			= $this->M_kk->cek_id($id)->row_array();
			$this->load->view('template', $data);
		}else{
			$this->M_kk->edit_proses($no_kk);
			$this->session->set_flashdata('sukses_edit','1');
			redirect('kk','refresh');
		}
	}

	public function cetak_keluarga($no_kk)
	{
		$data['judul']		= 'PRINT DATA ANGGOTA KELUARGA';
		$this->load->library('dompdf_gen'); //me load ibrary dompdf_gen yang telah di copy kan
		$data['kk']	= $this->M_kk->cek_id($no_kk)->row_array(); //mengabil data dari M_penduduk
		$data['penduduk']	= $this->M_kk->cek_id_p($no_kk)->result(); //mengabil data dari M_penduduk
		$this->load->view('admin/kk/print_keluarga', $data); //me load view penduduk/print

		$dompdf 			= new DOMPDF(); //membuat objek baru bernama $dompdf

		$paper_size		= 'A4'; //membuat variabel untuk menampung data settingan paper_size
		$orientation	= 'potrait'; //membuat variabel untuk menampung data settingan orientation
		$this->dompdf->set_paper($paper_size, $orientation); //mengeksekusi fungsi set_paper

		$html 			= $this->output->get_output();
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('laporan_keluarga.pdf', array('Attachment' => 0)); //fungsi untuk mencetak
		unset($html);
		unset($dompdf);
	}

	public function cetak_kk()
	{
		$data['judul']		= 'PRINT DATA KK';
		$this->load->library('dompdf_gen'); //me load ibrary dompdf_gen yang telah di copy kan
		$data['kk']	= $this->M_kk->all()->result(); //mengabil data dari M_penduduk
		$this->load->view('admin/kk/print_kk', $data); //me load view penduduk/print

		$dompdf 			= new DOMPDF(); //membuat objek baru bernama $dompdf

		$paper_size		= 'A4'; //membuat variabel untuk menampung data settingan paper_size
		$orientation	= 'potrait'; //membuat variabel untuk menampung data settingan orientation
		$this->dompdf->set_paper($paper_size, $orientation); //mengeksekusi fungsi set_paper

		$html 			= $this->output->get_output();
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('laporan_kk.pdf', array('Attachment' => 0)); //fungsi untuk mencetak
		unset($html);
		unset($dompdf);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */