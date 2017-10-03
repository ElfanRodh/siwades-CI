<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penduduk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penduduk');
		$this->load->model('M_dokumen');
		if ($this->session->userdata('nik') == '') {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['judul']		= 'SIWADES || PENDUDUK';
		$data['aktif'] 		= 'menu';
		$data['aktif2'] 	= 'penduduk';
		$data['konten'] 	= 'admin/penduduk/index.php';
		$data['penduduk']	= $this->M_penduduk->all()->result();
		$this->load->view('template', $data);
	}

	public function tambah_proses($no_kk)
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIK Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tempat Lahir Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Lahir Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenis Kelamin Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pendidikan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pekerjaan Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['judul']		= 'SIWADES || KK || DETAIL';
			$data['aktif'] 		= 'menu';
			$data['aktif2'] 	= 'penduduk';
			$data['konten'] 	= 'admin/kk/detail.php';
			$data['penduduk']	= $this->M_penduduk->all()->result();
			$this->load->view('template', $data);
		}else{
			//setting config untuk library upload
			$config['upload_path'] 		= './assets/images/penduduk';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']     	= 1000000000;
			$config['max_width'] 		= 1024000;
			$config['max_height'] 		= 768000;

			//pemanggilan librabry upload
			$this->load->library('upload', $config);

			//jika upload gagal
			if ( ! $this->upload->do_upload('foto'))
            {
				$this->session->set_flashdata('gagal_tambah_upload','1');
				$data['modal_show'] = "$('#modal_large').modal('show');";
				$data['judul']		= 'SIWADES || KK || DETAIL';
				$data['aktif'] 		= 'menu';
				$data['aktif2'] 	= 'penduduk';
				$data['konten'] 	= 'admin/kk/detail.php';
				$data['penduduk']	= $this->M_penduduk->all()->result();
				$this->load->view('template', $data);
			//jika upload berhasil
            }else{
            	$gambar = $this->upload->data();

            	//memanggil library image
				$this->load->library('image_lib');
				//setting konfigurasi image_lib
				$this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => './assets/images/penduduk/'. $gambar['file_name'],
                    'maintain_ratio' => true,
                    'create_thumb' => true,
                    'quality' => '20%',
                    'width' => 240
                ));

				//jika fungsi resize image berhasil dijalankam
                if($this->image_lib->resize())
                {
                	//menyimpan kedalam database
                   	$this->M_penduduk->tambah_proses($no_kk, $gambar['raw_name'].'_thumb'.$gambar['file_ext']);
					$this->session->set_flashdata('sukses_tambah','1');
					redirect('kk/detail/'.$no_kk);	//jika fung resize image gagal
                }else{
                    $this->session->set_flashdata('gagal_tambah_resize','1');
					$data['modal_show'] = "$('#modal_large').modal('show');";
					$data['judul']		= 'SIWADES || KK || DETAIL';
					$data['aktif'] 		= 'menu';
					$data['aktif2'] 	= 'penduduk';
					$data['konten'] 	= 'admin/kk/detail.php';
					$data['penduduk']	= $this->M_penduduk->all()->result();
					$this->load->view('template', $data);
                }
			}
		}
	}

	public function edit_penduduk($id)
	{
		$data['judul']		= 'SIWADES || PENDUDUK || EDIT';
		$data['aktif'] 		= 'menu';
		$data['aktif2'] 	= 'kk';
		$data['konten'] 	= 'admin/kk/edit_penduduk.php';
		$data['penduduk']	= $this->M_penduduk->cek_id($id)->row_array();
		$this->load->view('template', $data);
	}

	public function edit_proses2($id, $no_kk)
	{
		$id = $this->uri->segment(3);
		$no_kk = $this->uri->segment(4);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tempat Lahir Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Lahir Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenis Kelamin Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pendidikan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pekerjaan Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['judul']		= 'SIWADES || PENDUDUK || EDIT';
			$data['aktif'] 		= 'menu';
			$data['aktif2'] 	= 'kk';
			$data['konten'] 	= 'admin/kk/edit_penduduk.php';
			$data['penduduk']	= $this->M_penduduk->cek_id($id)->row_array();
			$this->load->view('template', $data);
		}else{
			if ($_FILES["foto_baru"]["name"] == "") {
				$foto_lama = $this->input->post('foto_lama');
				$this->M_penduduk->edit_proses($id, $foto_lama);
				$this->session->set_flashdata('sukses_edit','1');
				redirect('penduduk');
			}else{
				//setting config untuk library upload
				$config['upload_path'] 		= './assets/images/penduduk';
				$config['allowed_types'] 	= 'gif|jpg|png';
				$config['max_size']     	= 1000000000;
				$config['max_width'] 		= 1024000;
				$config['max_height'] 		= 768000;

				//pemanggilan librabry upload
				$this->load->library('upload', $config);

				//jika upload gagal
				if ( ! $this->upload->do_upload('foto_baru'))
	            {
					$this->session->set_flashdata('gagal_tambah_upload','1');
					redirect('penduduk/edit_penduduk/'.$id);
				//jika upload berhasil
	            }else{
	            	$gambar = $this->upload->data();

	            	//memanggil library image
					$this->load->library('image_lib');
					//setting konfigurasi image_lib
					$this->image_lib->initialize(array(
	                    'image_library' => 'gd2',
	                    'source_image' => './assets/images/penduduk/'. $gambar['file_name'],
	                    'maintain_ratio' => true,
	                    'create_thumb' => true,
	                    'quality' => '20%',
	                    'width' => 240
	                ));

					//jika fungsi resize image berhasil dijalankam
	                if($this->image_lib->resize())
	                {
	                	//menyimpan kedalam database
	                   	$this->M_penduduk->edit_proses($id, $gambar['raw_name'].'_thumb'.$gambar['file_ext']);
						$this->session->set_flashdata('sukses_edit','1');
						redirect('kk/detail/'.$no_kk);	
					//jika fung resize image gagal
	                }else{
	                    $this->session->set_flashdata('gagal_tambah_resize','1');
						redirect('penduduk/edit_penduduk/'.$id);
	                }
				}
			}
		}
	}

	public function edit($id)
	{
		$data['judul']		= 'SIWADES || PENDUDUK || EDIT';
		$data['aktif'] 		= 'menu';
		$data['aktif2'] 	= 'penduduk';
		$data['konten'] 	= 'admin/penduduk/edit.php';
		$data['penduduk']	= $this->M_penduduk->cek_id($id)->row_array();
		$this->load->view('template', $data);
	}

	public function edit_proses($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tempat Lahir Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Lahir Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenis Kelamin Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pendidikan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Pekerjaan Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['judul']		= 'SIWADES || PENDUDUK || EDIT';
			$data['aktif'] 		= 'menu';
			$data['aktif2'] 	= 'penduduk';
			$data['konten'] 	= 'admin/penduduk/edit.php';
			$data['penduduk']	= $this->M_penduduk->cek_id($id)->row_array();
			$this->load->view('template', $data);
		}else{
			if ($_FILES["foto_baru"]["name"] == "") {
				$foto_lama = $this->input->post('foto_lama');
				$this->M_penduduk->edit_proses($id, $foto_lama);
				$this->session->set_flashdata('sukses_edit','1');
				redirect('penduduk');
			}else{
				//setting config untuk library upload
				$config['upload_path'] 		= './assets/images/penduduk';
				$config['allowed_types'] 	= 'gif|jpg|png';
				$config['max_size']     	= 1000000000;
				$config['max_width'] 		= 1024000;
				$config['max_height'] 		= 768000;

				//pemanggilan librabry upload
				$this->load->library('upload', $config);

				//jika upload gagal
				if ( ! $this->upload->do_upload('foto_baru'))
	            {
					$this->session->set_flashdata('gagal_tambah_upload','1');
					redirect('penduduk/edit/'.$id);
				//jika upload berhasil
	            }else{
	            	$gambar = $this->upload->data();

	            	//memanggil library image
					$this->load->library('image_lib');
					//setting konfigurasi image_lib
					$this->image_lib->initialize(array(
	                    'image_library' => 'gd2',
	                    'source_image' => './assets/images/penduduk/'. $gambar['file_name'],
	                    'maintain_ratio' => true,
	                    'create_thumb' => true,
	                    'quality' => '20%',
	                    'width' => 240
	                ));

					//jika fungsi resize image berhasil dijalankam
	                if($this->image_lib->resize())
	                {
	                	//menyimpan kedalam database
	                   	$this->M_penduduk->edit_proses($id, $gambar['raw_name'].'_thumb'.$gambar['file_ext']);
						$this->session->set_flashdata('sukses_edit','1');
						redirect('penduduk');	
					//jika fung resize image gagal
	                }else{
	                    $this->session->set_flashdata('gagal_tambah_resize','1');
						redirect('penduduk/edit/'.$id);
	                }
				}
			}
		}
	}

	public function detail($id)
	{
		$data['judul']		= 'SIWADES || PENDUDUK || DETAIL';
		$data['aktif'] 		= 'menu';
		$data['aktif2'] 	= 'penduduk';
		$data['konten'] 	= 'admin/penduduk/detail.php';
		$data['penduduk']	= $this->M_penduduk->cek_id($id)->row_array();
		$data['dokumen']	= $this->M_dokumen->all()->result();
		$this->load->view('template', $data);
	}

	public function hapus($id)
	{
		$this->db->where('nik', $id);
		$this->db->delete('penduduk');
		$this->session->set_flashdata('sukses_hapus','1');
		redirect('penduduk','refresh');
	}

	public function tambah_dokumen($id)
	{
		$nik = $this->input->post('nik');
		//setting config untuk library upload
		$config['upload_path'] 		= './assets/files/penduduk';
		$config['allowed_types'] 	= 'pdf';
		$config['max_size']     	= 1000000000;

		//pemanggilan librabry upload
		$this->load->library('upload', $config);

		//jika upload gagal
		if ( ! $this->upload->do_upload('dokumen'))
        {
			$this->session->set_flashdata('gagal_tambah_dokumen','1');
			redirect('penduduk/detail/'.$nik);
		//jika upload berhasil
        }else{
        	$doc = $this->upload->data();
        	$this->M_penduduk->tambah_dokumen($id, $nik , $doc['raw_name'].$doc['file_ext']);
			$this->session->set_flashdata('sukses_dokumen','1');
			redirect('penduduk/detail/'.$nik);
        }
	}

	public function hapus_dokumen()
	{
		$id = $this->uri->segment(3);
		$nik = $this->uri->segment(4);
		$q = $this->db->query("SELECT file FROM dokumen_penduduk WHERE id_dokumen = '$id' AND nik = '$nik'")->row_array();
		$file = base_url('assets/files/penduduk/'.$q['file']);
		unlink($file);
		$this->db->where('id_dokumen', $id);
		$this->db->where('nik', $nik);
		$this->db->delete('dokumen_penduduk');
		$this->session->set_flashdata('sukses_hapus_dokumen','1');
		redirect('penduduk/detail/'.$nik);
	}

	public function embed()
    {
        $file = $this->uri->segment(3);
        echo "<embed src='".base_url('assets/files/penduduk/'.$file)."' width='100%' height='100%'></embed>";
    }

	public function cetakPDF()
	{
		$data['judul']		= 'PRINT DATA';
		$this->load->library('dompdf_gen'); //me load ibrary dompdf_gen yang telah di copy kan
		$data['penduduk']	= $this->M_penduduk->all()->result(); //mengabil data dari M_penduduk
		$this->load->view('admin/penduduk/print', $data); //me load view penduduk/print

		$dompdf 			= new DOMPDF(); //membuat objek baru bernama $dompdf

		$paper_size		= 'A4'; //membuat variabel untuk menampung data settingan paper_size
		$orientation	= 'potrait'; //membuat variabel untuk menampung data settingan orientation
		$this->dompdf->set_paper($paper_size, $orientation); //mengeksekusi fungsi set_paper

		$html 			= $this->output->get_output();
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('laporan_penduduk.pdf', array('Attachment' => 0)); //fungsi untuk mencetak
		unset($html);
		unset($dompdf);
	}

	public function data_server()
	{
		$this->load->library('Datatables');
		$this->datatables->select('nik, nama, jk, tempat_lahir, tanggal_lahir');
		$this->datatables->from('penduduk');
		echo $this->datatables->generate();
	}
}

/* End of file Penduduk.php */
/* Location: ./application/controllers/Penduduk.php */