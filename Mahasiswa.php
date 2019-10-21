<?php 

class Mahasiswa extends CI_Controller {

	public function __construct ()
	{
		parent ::__construct ();
		$this->load->model('Mahasiswa_model');
		$this->load->library('form_validation');

		if(empty($this->session->userdata('login')) && $this->session->userdata('login') != true)
		{
			redirect('login');
		}
	}

	public function index ()
	{
	
		$data['judul'] = 'Daftar Mahasiswa';
		$data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
		if ($this->input->post('keyword')) {
			$data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
		}
		$this->load->view('templates/header',$data);
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah ()
	{

		$data['judul'] = 'From Tambah Data Mahasiswa';

		$this->form_validation->set_rules('Nama', 'Nama', 'required');
		$this->form_validation->set_rules('Nim', 'Nim', 'required|numeric');
		$this->form_validation->set_rules('Email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header',$data);
		$this->load->view('mahasiswa/tambah');
		$this->load->view('templates/footer');
		} else{
			$this->Mahasiswa_model->tambahDataMahasiswa();
			$this->session->set_flashdata('flash','Di Simpan');
			redirect("mahasiswa");
		}

	}

	public function hapus($Id)
	{
		$this->Mahasiswa_model->hapusDataMahasiswa($Id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect("mahasiswa");
	}

	public function detail($Id)
	{
		$data['judul'] = 'Detail Data Mahasiswa';
		$data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($Id);
		$this->load->view('templates/header',$data);
		$this->load->view('mahasiswa/detail',$data);
		$this->load->view('templates/footer');
	}

	public function ubah ($Id)
	{

		$data['judul'] = 'From ubah Data Mahasiswa';
		$data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($Id);
		$data['Jurusan'] = ['Teknik Informatika','Teknik Mesin','Teknik Elektro','Bahasa','Akutansi'];

		$this->form_validation->set_rules('Nama', 'Nama', 'required');
		$this->form_validation->set_rules('Nim', 'Nim', 'required|numeric');
		$this->form_validation->set_rules('Email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header',$data);
		$this->load->view('mahasiswa/ubah',$data);
		$this->load->view('templates/footer');
		} else{
			$this->Mahasiswa_model->ubahDataMahasiswa();
			$this->session->set_flashdata('flash','Di ubah');
			redirect("mahasiswa");
		}

	}
}